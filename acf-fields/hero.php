<?php
/**
 * Carbon Fields Block — Hero
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Hero', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'cover-image' )
    ->set_description( __( 'Section hero plein écran avec image de fond et CTA.', 'mbnl' ) )
    ->set_keywords( [ 'hero', 'banner', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'hero_subtitle', __( 'Sous-titre', 'mbnl' ) )
            ->set_default_value( 'Maçonnerie & Béton New Look' ),
        Field::make( 'textarea', 'hero_title', __( 'Titre principal (H1)', 'mbnl' ) )
            ->set_rows( 3 )
            ->set_default_value( 'Installation de brique, pierre et bloc de béton à Montréal, Laval et sur la Rive‑Nord' ),
        Field::make( 'textarea', 'hero_description', __( 'Description', 'mbnl' ) )
            ->set_rows( 3 )
            ->set_default_value( 'MBNL réalise des projets résidentiels, multilogements et commerciaux avec précision, alignement parfait et finitions haut de gamme.' ),
        Field::make( 'image', 'hero_image', __( 'Image de fond', 'mbnl' ) ),
        Field::make( 'text', 'hero_cta_label', __( 'Bouton CTA — texte', 'mbnl' ) )
            ->set_default_value( 'Demander une soumission' ),
        Field::make( 'text', 'hero_cta_url', __( 'Bouton CTA — lien', 'mbnl' ) )
            ->set_default_value( '#contact' ),
        Field::make( 'text', 'hero_secondary_label', __( 'Bouton secondaire — texte', 'mbnl' ) )
            ->set_default_value( 'Voir nos projets' ),
        Field::make( 'text', 'hero_secondary_url', __( 'Bouton secondaire — lien', 'mbnl' ) )
            ->set_default_value( '#realisations' ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/hero.php';
    } );
