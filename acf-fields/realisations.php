<?php
/**
 * Carbon Fields Block — Réalisations
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Réalisations', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'format-gallery' )
    ->set_description( __( 'Portfolio de projets réalisés.', 'mbnl' ) )
    ->set_keywords( [ 'réalisations', 'portfolio', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'realisations_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Portfolio' ),
        Field::make( 'text', 'realisations_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'Nos réalisations' ),
        Field::make( 'complex', 'realisations_items', __( 'Projets', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'image', 'image', __( 'Image', 'mbnl' ) ),
                Field::make( 'text', 'title', __( 'Titre du projet', 'mbnl' ) ),
                Field::make( 'text', 'category', __( 'Catégorie', 'mbnl' ) ),
                Field::make( 'checkbox', 'featured', __( 'Mise en avant (grande carte)', 'mbnl' ) )
                    ->set_option_value( 'yes' ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/realisations.php';
    } );
