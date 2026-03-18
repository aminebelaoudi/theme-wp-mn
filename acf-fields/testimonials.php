<?php
/**
 * Carbon Fields Block — Témoignages
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Témoignages', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'format-quote' )
    ->set_description( __( 'Avis clients avec étoiles.', 'mbnl' ) )
    ->set_keywords( [ 'témoignages', 'avis', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'testimonials_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Témoignages' ),
        Field::make( 'text', 'testimonials_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'Ce que nos clients disent' ),
        Field::make( 'complex', 'testimonials_items', __( 'Témoignages', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'textarea', 'quote', __( 'Citation', 'mbnl' ) )
                    ->set_rows( 3 ),
                Field::make( 'text', 'author', __( 'Auteur', 'mbnl' ) ),
                Field::make( 'text', 'location', __( 'Ville / Quartier', 'mbnl' ) ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/testimonials.php';
    } );
