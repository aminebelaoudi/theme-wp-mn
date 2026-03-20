<?php
/**
 * Carbon Fields Block — Régions
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Régions', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'location-alt' )
    ->set_description( __( 'Section zones desservies avec fond sombre.', 'mbnl' ) )
    ->set_keywords( [ 'régions', 'zones', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'regions_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Régions' ),
        Field::make( 'textarea', 'regions_title', __( 'Titre', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Zones desservies' ),
        Field::make( 'textarea', 'regions_desc', __( 'Description', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Nous intervenons dans toute la région de Montréal, Laval, et sur la Rive-Nord.' ),
        Field::make( 'complex', 'regions_items', __( 'Régions', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'text', 'region_name', __( 'Nom de la région', 'mbnl' ) ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/regions.php';
    } );
