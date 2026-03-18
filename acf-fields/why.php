<?php
/**
 * Carbon Fields Block — Why
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Pourquoi', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'info' )
    ->set_description( __( 'Section expliquant pourquoi le rejointoiement est essentiel.', 'mbnl' ) )
    ->set_keywords( [ 'why', 'pourquoi', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'why_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Rejointoiement' ),
        Field::make( 'text', 'why_title', __( 'Titre de section', 'mbnl' ) )
            ->set_default_value( 'Pourquoi le rejointoiement est essentiel' ),
        Field::make( 'textarea', 'why_intro', __( 'Texte d\'introduction', 'mbnl' ) )
            ->set_rows( 3 )
            ->set_default_value( "Un rejointoiement négligé entraîne des dommages majeurs à long terme.\nUne intervention préventive permet d'éviter des réparations coûteuses." ),
        Field::make( 'complex', 'why_items', __( 'Raisons', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'text', 'icon', __( 'Icône (nom Lucide)', 'mbnl' ) )
                    ->set_default_value( 'alert-triangle' ),
                Field::make( 'text', 'title', __( 'Titre', 'mbnl' ) ),
                Field::make( 'textarea', 'description', __( 'Description', 'mbnl' ) )
                    ->set_rows( 2 ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/why.php';
    } );
