<?php
/**
 * Carbon Fields Block — Signature
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Signature', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'awards' )
    ->set_description( __( 'Section piliers qualité avec stats.', 'mbnl' ) )
    ->set_keywords( [ 'signature', 'qualité', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'signature_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Notre signature' ),
        Field::make( 'textarea', 'signature_title', __( 'Titre', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'La précision qui distingue les vrais maçons.' ),
        Field::make( 'textarea', 'signature_desc', __( 'Description', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Chaque projet porte notre exigence. Pas de compromis sur l\'alignement, les matériaux et la finition.' ),
        Field::make( 'complex', 'signature_pillars', __( 'Piliers (cartes)', 'mbnl' ) )
            ->add_fields( array(
                Field::make( 'text', 'icon', __( 'Icône (nom Lucide)', 'mbnl' ) )
                    ->set_default_value( 'ruler' ),
                Field::make( 'text', 'title', __( 'Titre', 'mbnl' ) ),
                Field::make( 'textarea', 'desc', __( 'Description', 'mbnl' ) )
                    ->set_rows( 2 ),
                Field::make( 'text', 'stat', __( 'Statistique (chiffre)', 'mbnl' ) ),
                Field::make( 'text', 'suffix', __( 'Suffixe (unité)', 'mbnl' ) ),
                Field::make( 'text', 'stat_label', __( 'Label de la stat', 'mbnl' ) ),
                Field::make( 'text', 'link', __( 'Lien "Découvrir" (optionnel)', 'mbnl' ) )
                    ->set_help_text( __( 'Laisser vide pour masquer le bouton.', 'mbnl' ) ),
            ) ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/signature.php';
    } );
