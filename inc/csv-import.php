<?php
/**
 * MBNL — Import de pages services via CSV
 *
 * Ajoute une page admin sous Outils > Importer Services
 * Permet d'uploader un CSV (;) et de créer automatiquement
 * des pages avec les blocs Carbon Fields pré-remplis.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ─── Admin Menu ─────────────────────────────────────────────
add_action( 'admin_menu', function () {
    add_management_page(
        'Importer des services (CSV)',
        'Importer Services',
        'manage_options',
        'mbnl-csv-import',
        'mbnl_csv_import_page'
    );
} );

// ─── Block name mapping ─────────────────────────────────────
function mbnl_get_block_names() {
    return array(
        'hero'          => 'carbon-fields/mbnl-hero',
        'signature'     => 'carbon-fields/mbnl-signature',
        'process'       => 'carbon-fields/mbnl-processus',
        'realisations'  => 'carbon-fields/mbnl-realisations',
        'services'      => 'carbon-fields/mbnl-services',
        'contact'       => 'carbon-fields/mbnl-contact-cta',
        'faq'           => 'carbon-fields/mbnl-faq',
        'why'           => 'carbon-fields/mbnl-pourquoi',
        'testimonials'  => 'carbon-fields/mbnl-temoignages',
    );
}

// ─── Section → field mapping ────────────────────────────────
function mbnl_get_section_fields() {
    return array(
        'hero' => array(
            'hero_subtitle', 'hero_title', 'hero_description',
            'hero_cta_label', 'hero_cta_url',
            'hero_secondary_label', 'hero_secondary_url',
        ),
        'signature' => array(
            'signature_label', 'signature_title', 'signature_desc',
            'signature_pillars',
        ),
        'process' => array(
            'process_label', 'process_title', 'process_steps',
        ),
        'realisations' => array(
            'realisations_label', 'realisations_title',
        ),
        'contact' => array(
            'contact_label', 'contact_title', 'contact_desc',
            'contact_btn_label', 'contact_phone',
        ),
        'faq' => array(
            'faq_label', 'faq_title', 'faq_items',
        ),
        'why' => array(
            'why_label', 'why_title', 'why_intro', 'why_items',
        ),
        'testimonials' => array(
            'testimonials_label', 'testimonials_title',
        ),
    );
}

// ─── Complex (repeater) fields ──────────────────────────────
function mbnl_get_complex_fields() {
    return array(
        'signature_pillars', 'process_steps', 'faq_items',
        'why_items', 'realisations_items', 'services_items',
        'testimonials_items',
    );
}

// ─── Build a single Gutenberg block comment ─────────────────
function mbnl_build_block( $block_name, $data ) {
    $json = wp_json_encode( array( 'data' => $data ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
    return '<!-- wp:' . $block_name . ' ' . $json . ' /-->';
}

// ─── Build full post_content from CSV row ───────────────────
function mbnl_build_post_content( $row, $headers ) {
    $block_names    = mbnl_get_block_names();
    $section_fields = mbnl_get_section_fields();
    $complex_fields = mbnl_get_complex_fields();

    // Map headers → values
    $data = array();
    foreach ( $headers as $i => $key ) {
        $data[ $key ] = isset( $row[ $i ] ) ? trim( $row[ $i ] ) : '';
    }

    // Determine which sections to include and in what order
    $sections_str = ! empty( $data['sections'] ) ? $data['sections'] : 'hero,signature,process,contact';
    $sections = array_map( 'trim', explode( ',', $sections_str ) );

    $blocks = array();

    foreach ( $sections as $section ) {
        if ( ! isset( $block_names[ $section ] ) || ! isset( $section_fields[ $section ] ) ) {
            continue;
        }

        $block_data = array();
        $has_content = false;

        foreach ( $section_fields[ $section ] as $field ) {
            $value = isset( $data[ $field ] ) ? $data[ $field ] : '';

            if ( in_array( $field, $complex_fields, true ) && $value !== '' ) {
                $decoded = json_decode( $value, true );
                if ( is_array( $decoded ) ) {
                    $value = $decoded;
                }
            }

            if ( $value !== '' ) {
                $has_content = true;
            }

            $block_data[ $field ] = $value;
        }

        // Only add block if at least one field has content
        if ( $has_content ) {
            $blocks[] = mbnl_build_block( $block_names[ $section ], $block_data );
        }
    }

    return implode( "\n\n", $blocks );
}

// ─── Process CSV Upload ─────────────────────────────────────
function mbnl_process_csv_import() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Accès refusé.' );
    }

    check_admin_referer( 'mbnl_csv_import_action', 'mbnl_csv_import_nonce' );

    if ( empty( $_FILES['csv_file']['tmp_name'] ) ) {
        return array( 'error' => 'Aucun fichier sélectionné.' );
    }

    $file = $_FILES['csv_file']['tmp_name'];

    // Validate file type
    $file_info = wp_check_filetype( $_FILES['csv_file']['name'] );
    if ( ! in_array( $file_info['ext'], array( 'csv', 'txt' ), true ) ) {
        return array( 'error' => 'Le fichier doit être un CSV (.csv).' );
    }

    // Detect delimiter (semicolon or comma)
    $first_line = '';
    $handle = fopen( $file, 'r' );
    if ( $handle ) {
        $first_line = fgets( $handle );
        fclose( $handle );
    }
    $delimiter = ( substr_count( $first_line, ';' ) > substr_count( $first_line, ',' ) ) ? ';' : ',';

    $handle = fopen( $file, 'r' );
    if ( ! $handle ) {
        return array( 'error' => 'Impossible d\'ouvrir le fichier.' );
    }

    // Read headers
    $headers = fgetcsv( $handle, 0, $delimiter, '"', '\\' );
    if ( ! $headers ) {
        fclose( $handle );
        return array( 'error' => 'Fichier CSV vide ou format invalide.' );
    }

    // Clean BOM from first header
    $headers[0] = preg_replace( '/^\xEF\xBB\xBF/', '', $headers[0] );
    $headers = array_map( 'trim', $headers );

    // Check required columns
    if ( ! in_array( 'page_title', $headers, true ) ) {
        fclose( $handle );
        return array( 'error' => 'Colonne "page_title" manquante dans le CSV.' );
    }

    $results = array();
    $row_num = 1;

    while ( ( $row = fgetcsv( $handle, 0, $delimiter, '"', '\\' ) ) !== false ) {
        $row_num++;

        // Map headers to values
        $row_data = array();
        foreach ( $headers as $i => $key ) {
            $row_data[ $key ] = isset( $row[ $i ] ) ? $row[ $i ] : '';
        }

        $page_title = trim( $row_data['page_title'] );
        if ( empty( $page_title ) ) {
            $results[] = array( 'row' => $row_num, 'status' => 'skip', 'message' => 'Titre de page vide — ligne ignorée.' );
            continue;
        }

        $page_slug = ! empty( $row_data['page_slug'] ) ? sanitize_title( $row_data['page_slug'] ) : sanitize_title( $page_title );

        // Check if a page with this slug already exists
        $existing = get_page_by_path( $page_slug );
        if ( $existing ) {
            $results[] = array( 'row' => $row_num, 'status' => 'skip', 'message' => "Page \"$page_title\" existe déjà (slug: $page_slug)." );
            continue;
        }

        // Build post_content with Gutenberg blocks
        $post_content = mbnl_build_post_content( $row, $headers );

        $post_id = wp_insert_post( array(
            'post_title'   => $page_title,
            'post_name'    => $page_slug,
            'post_content' => $post_content,
            'post_status'  => 'draft',
            'post_type'    => 'page',
        ), true );

        if ( is_wp_error( $post_id ) ) {
            $results[] = array( 'row' => $row_num, 'status' => 'error', 'message' => "Erreur: " . $post_id->get_error_message() );
        } else {
            $edit_link = get_edit_post_link( $post_id, 'raw' );
            $results[] = array( 'row' => $row_num, 'status' => 'success', 'message' => "Page \"$page_title\" créée (brouillon).", 'edit_link' => $edit_link, 'post_id' => $post_id );
        }
    }

    fclose( $handle );

    return array( 'results' => $results );
}

// ─── Admin Page Render ──────────────────────────────────────
function mbnl_csv_import_page() {
    $results = null;
    if ( isset( $_POST['mbnl_csv_import_nonce'] ) ) {
        $results = mbnl_process_csv_import();
    }

    $template_url = get_template_directory_uri() . '/imports/services-template.csv';
    ?>
    <div class="wrap">
        <h1>Importer des pages services via CSV</h1>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2>Instructions</h2>
            <ol>
                <li>Téléchargez le <a href="<?php echo esc_url( $template_url ); ?>" download><strong>modèle CSV</strong></a></li>
                <li>Remplissez une ligne par page de service</li>
                <li>Uploadez le fichier ci-dessous</li>
                <li>Les pages seront créées en <strong>brouillon</strong> — à publier manuellement</li>
            </ol>

            <h3>Colonnes disponibles</h3>
            <table class="widefat" style="margin-bottom: 20px;">
                <thead>
                    <tr><th>Colonne</th><th>Description</th><th>Obligatoire</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>page_title</code></td><td>Titre de la page</td><td>Oui</td></tr>
                    <tr><td><code>page_slug</code></td><td>Slug URL (auto-généré si vide)</td><td>Non</td></tr>
                    <tr><td><code>sections</code></td><td>Sections à inclure, séparées par des virgules.<br>Ex: <code>hero,signature,process,contact</code><br>Options: hero, signature, process, realisations, services, contact, faq, why, testimonials</td><td>Non (défaut: hero,signature,process,contact)</td></tr>
                    <tr><td><code>hero_*</code></td><td>hero_subtitle, hero_title, hero_description, hero_cta_label, hero_cta_url, hero_secondary_label, hero_secondary_url</td><td>Non</td></tr>
                    <tr><td><code>signature_*</code></td><td>signature_label, signature_title, signature_desc, signature_pillars (JSON)</td><td>Non</td></tr>
                    <tr><td><code>process_*</code></td><td>process_label, process_title, process_steps (JSON)</td><td>Non</td></tr>
                    <tr><td><code>contact_*</code></td><td>contact_label, contact_title, contact_desc, contact_btn_label, contact_phone</td><td>Non</td></tr>
                    <tr><td><code>faq_*</code></td><td>faq_label, faq_title, faq_items (JSON)</td><td>Non</td></tr>
                    <tr><td><code>why_*</code></td><td>why_label, why_title, why_intro, why_items (JSON)</td><td>Non</td></tr>
                </tbody>
            </table>

            <h3>Format des champs JSON (complexes)</h3>
            <p>Pour les champs répéteurs, utilisez du JSON entre guillemets doubles. En CSV, échappez les guillemets avec <code>""</code>.</p>
            <details style="margin-bottom: 15px;">
                <summary><strong>Exemple: signature_pillars</strong></summary>
                <pre style="background:#f0f0f0;padding:10px;overflow-x:auto;">[{"icon":"ruler","title":"Précision","desc":"Description...","stat":"0.5","suffix":"mm","stat_label":"de tolérance","link":""}]</pre>
            </details>
            <details style="margin-bottom: 15px;">
                <summary><strong>Exemple: faq_items</strong></summary>
                <pre style="background:#f0f0f0;padding:10px;overflow-x:auto;">[{"q":"Question?","a":"Réponse."},{"q":"Autre question?","a":"Autre réponse."}]</pre>
            </details>
            <details style="margin-bottom: 15px;">
                <summary><strong>Exemple: process_steps</strong></summary>
                <pre style="background:#f0f0f0;padding:10px;overflow-x:auto;">[{"num":"01","title":"Inspection"},{"num":"02","title":"Préparation"},{"num":"03","title":"Exécution"},{"num":"04","title":"Livraison"}]</pre>
            </details>
            <details style="margin-bottom: 15px;">
                <summary><strong>Exemple: why_items</strong></summary>
                <pre style="background:#f0f0f0;padding:10px;overflow-x:auto;">[{"icon":"droplets","title":"Infiltrations d'eau","description":"L'eau s'infiltre par les joints dégradés."}]</pre>
            </details>
        </div>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2>Uploader le CSV</h2>
            <form method="post" enctype="multipart/form-data">
                <?php wp_nonce_field( 'mbnl_csv_import_action', 'mbnl_csv_import_nonce' ); ?>
                <table class="form-table">
                    <tr>
                        <th><label for="csv_file">Fichier CSV</label></th>
                        <td>
                            <input type="file" name="csv_file" id="csv_file" accept=".csv,.txt" required>
                            <p class="description">Délimiteur auto-détecté (point-virgule <code>;</code> ou virgule <code>,</code>)</p>
                        </td>
                    </tr>
                </table>
                <?php submit_button( 'Importer les pages', 'primary', 'submit', true ); ?>
            </form>
        </div>

        <?php if ( $results ) : ?>
        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2>Résultats de l'import</h2>

            <?php if ( isset( $results['error'] ) ) : ?>
                <div class="notice notice-error inline"><p><?php echo esc_html( $results['error'] ); ?></p></div>
            <?php elseif ( isset( $results['results'] ) ) : ?>
                <table class="widefat striped">
                    <thead>
                        <tr><th>Ligne</th><th>Statut</th><th>Message</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $results['results'] as $r ) : ?>
                        <tr>
                            <td><?php echo esc_html( $r['row'] ); ?></td>
                            <td>
                                <?php if ( $r['status'] === 'success' ) : ?>
                                    <span style="color:green;">&#10003; Créé</span>
                                <?php elseif ( $r['status'] === 'skip' ) : ?>
                                    <span style="color:orange;">&#9888; Ignoré</span>
                                <?php else : ?>
                                    <span style="color:red;">&#10007; Erreur</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo esc_html( $r['message'] ); ?></td>
                            <td>
                                <?php if ( ! empty( $r['edit_link'] ) ) : ?>
                                    <a href="<?php echo esc_url( $r['edit_link'] ); ?>" class="button button-small" target="_blank">Modifier</a>
                                <?php else : ?>
                                    —
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php
}
