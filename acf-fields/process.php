<?php
/**
 * Carbon Fields Block — Processus
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Processus', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'list-view' )
    ->set_description( __( 'Étapes numérotées du processus.', 'mbnl' ) )
    ->set_keywords( [ 'process', 'étapes', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'process_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Notre processus' ),
        Field::make( 'text', 'process_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'De la vision à la réalisation' ),
        Field::make( 'complex', 'process_steps', __( 'Étapes', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'text', 'num', __( 'Numéro', 'mbnl' ) ),
                Field::make( 'text', 'title', __( 'Titre', 'mbnl' ) ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/process.php';
    } );
