<?php
/**
 * Carbon Fields Block — Services par ville
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Services par ville', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'location-alt' )
    ->set_description( __( 'Affiche les pages de services groupées par catégorie (ville).', 'mbnl' ) )
    ->set_keywords( [ 'services', 'villes', 'catégories', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'sv_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Nos services' ),
        Field::make( 'textarea', 'sv_title', __( 'Titre', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Services par région' ),
        Field::make( 'complex', 'sv_sections', __( 'Sections par ville', 'mbnl' ) )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'select', 'sv_category', __( 'Catégorie (ville)', 'mbnl' ) )
                    ->add_options( 'mbnl_get_category_options' ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/services-villes.php';
    } );

/**
 * Return an associative array of categories for the select dropdown.
 */
function mbnl_get_category_options() {
    $options    = array( '' => __( '— Sélectionner une catégorie —', 'mbnl' ) );
    $categories = get_categories( array(
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ) );
    foreach ( $categories as $cat ) {
        $options[ $cat->term_id ] = $cat->name;
    }
    return $options;
}
