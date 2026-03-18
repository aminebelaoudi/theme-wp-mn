<?php
/**
 * Carbon Fields Block — FAQ
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — FAQ', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'editor-help' )
    ->set_description( __( 'Accordéon de questions / réponses.', 'mbnl' ) )
    ->set_keywords( [ 'faq', 'questions', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'faq_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'FAQ' ),
        Field::make( 'text', 'faq_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'Questions fréquentes' ),
        Field::make( 'complex', 'faq_items', __( 'Questions / Réponses', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'text', 'q', __( 'Question', 'mbnl' ) ),
                Field::make( 'textarea', 'a', __( 'Réponse', 'mbnl' ) )
                    ->set_rows( 3 ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/faq.php';
    } );
