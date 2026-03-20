<?php
/**
 * Carbon Fields Block — À propos
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — À propos', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'info-outline' )
    ->set_description( __( 'Section À propos avec image, texte et CTA.', 'mbnl' ) )
    ->set_keywords( [ 'about', 'à propos', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'about_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'À propos' ),
        Field::make( 'textarea', 'about_title', __( 'Titre', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Une équipe passionnée, des résultats durables.' ),
        Field::make( 'rich_text', 'about_text', __( 'Texte principal', 'mbnl' ) )
            ->set_default_value( '<p>Depuis plus de <strong>15 ans</strong>, Maçonnerie & Béton New Look accompagne les propriétaires résidentiels, les gestionnaires de multilogements et les entreprises commerciales dans leurs projets de maçonnerie à Montréal, Laval et sur la Rive-Nord.</p><p>Notre expertise couvre l\'installation de brique, de pierre et de bloc de béton, le rejointoiement, ainsi que la réparation et la restauration de façades. Chaque chantier est mené avec rigueur, souci du détail et un engagement total envers la qualité.</p>' ),
        Field::make( 'image', 'about_image', __( 'Image', 'mbnl' ) ),
        Field::make( 'complex', 'about_stats', __( 'Statistiques', 'mbnl' ) )
            ->set_max( 4 )
            ->add_fields( array(
                Field::make( 'text', 'stat_value', __( 'Valeur (ex: 15+)', 'mbnl' ) ),
                Field::make( 'text', 'stat_label', __( 'Label (ex: Années d\'expérience)', 'mbnl' ) ),
            ) ),
        Field::make( 'text', 'about_cta_label', __( 'Bouton CTA — texte', 'mbnl' ) )
            ->set_default_value( 'Demander une soumission' ),
        Field::make( 'text', 'about_cta_url', __( 'Bouton CTA — lien', 'mbnl' ) )
            ->set_default_value( '#contact' ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/about.php';
    } );
