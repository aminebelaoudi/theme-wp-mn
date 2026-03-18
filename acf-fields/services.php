<?php
/**
 * Carbon Fields Block — Services
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Services', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'grid-view' )
    ->set_description( __( 'Grille de cartes de services.', 'mbnl' ) )
    ->set_keywords( [ 'services', 'cartes', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'services_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Nos services' ),
        Field::make( 'text', 'services_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'Expertise en maçonnerie' ),
        Field::make( 'color', 'services_title_color', __( 'Couleur du titre (optionnel)', 'mbnl' ) ),
        Field::make( 'textarea', 'services_desc', __( 'Paragraphe sous le titre (optionnel)', 'mbnl' ) )
            ->set_rows( 2 ),
        Field::make( 'complex', 'services_items', __( 'Cartes de services', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'image', 'image', __( 'Image', 'mbnl' ) ),
                Field::make( 'text', 'title', __( 'Titre', 'mbnl' ) ),
                Field::make( 'textarea', 'description', __( 'Description', 'mbnl' ) )
                    ->set_rows( 2 ),
                Field::make( 'text', 'link', __( 'Lien (optionnel)', 'mbnl' ) ),
            ) ),
        Field::make( 'text', 'services_btn_label', __( 'Bouton final — texte (optionnel)', 'mbnl' ) ),
        Field::make( 'text', 'services_btn_url', __( 'Bouton final — lien', 'mbnl' ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/services.php';
    } );
