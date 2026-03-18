<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f         = isset( $fields ) ? $fields : array();
$why_label = ! empty( $f['why_label'] ) ? $f['why_label'] : 'Rejointoiement';
$why_title = ! empty( $f['why_title'] ) ? $f['why_title'] : 'Pourquoi le rejointoiement est essentiel';
$why_intro = ! empty( $f['why_intro'] ) ? $f['why_intro'] : "Un rejointoiement négligé entraîne des dommages majeurs à long terme.\nUne intervention préventive permet d'éviter des réparations coûteuses.";
$why_items = ! empty( $f['why_items'] ) ? $f['why_items'] : array(
    array(
        'icon'        => 'droplets',
        'title'       => "Infiltrations d'eau et d'air",
        'description' => "L'eau et l'air s'infiltrent par les fissures et joints dégradés, causant humidité et dommages intérieurs.",
    ),
    array(
        'icon'        => 'layers',
        'title'       => 'Dégradation des joints et des parements',
        'description' => "Les joints et parements détériorés réduisent l'étanchéité et accélèrent l'usure du bâtiment.",
    ),
    array(
        'icon'        => 'thermometer',
        'title'       => 'Ponts thermiques et pertes énergétiques',
        'description' => "Les ponts thermiques augmentent les pertes de chaleur et font grimper les coûts énergétiques.",
    ),
    array(
        'icon'        => 'wrench',
        'title'       => 'Corrosion des ancrages et éléments structuraux',
        'description' => "L'humidité provoque la corrosion des ancrages et fragilise la structure.",
    ),
    array(
        'icon'        => 'alert-triangle',
        'title'       => 'Risques pour la sécurité des occupants',
        'description' => "Des composantes affaiblies peuvent entraîner des chutes dangereuses et des risques pour les occupants.",
    ),
);
?>
<!-- ═══ Why Section ═══ -->
<section id="pourquoi" class="section-why">
    <div class="container">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $why_label ); ?></p>
            <h2 class="section-title text-center mb-6"><?php echo esc_html( $why_title ); ?></h2>
            <p class="why-intro"><?php echo nl2br( esc_html( $why_intro ) ); ?></p>
        </div>

        <div class="why-grid">
            <?php foreach ( $why_items as $i => $item ) :
                $icon_key = ! empty( $item['icon'] ) ? $item['icon'] : 'alert-triangle';
            ?>
                <div class="why-card" data-aos="fade-up" data-aos-delay="<?php echo (int) $i * 100; ?>">
                    <div class="why-card-accent-bar"></div>
                    <div class="why-card-icon">
                        <?php echo mbnl_get_icon( $icon_key ); ?>
                    </div>
                    <h3 class="why-card-title"><?php echo esc_html( $item['title'] ); ?></h3>
                    <p class="why-card-desc"><?php echo esc_html( $item['description'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
