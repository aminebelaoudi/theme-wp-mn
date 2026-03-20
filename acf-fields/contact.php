<?php
/**
 * Carbon Fields Block — Contact CTA
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'MBNL — Contact CTA', 'mbnl' ) )
    ->set_category( 'mbnl-sections', __( 'Sections MBNL', 'mbnl' ), 'layout' )
    ->set_icon( 'phone' )
    ->set_description( __( 'Bande CTA avec numéro de téléphone.', 'mbnl' ) )
    ->set_keywords( [ 'contact', 'cta', 'mbnl' ] )
    ->add_fields( array(
        Field::make( 'text', 'contact_label', __( 'Label de section', 'mbnl' ) )
            ->set_default_value( 'Commencez ici' ),
        Field::make( 'text', 'contact_title', __( 'Titre', 'mbnl' ) )
            ->set_default_value( 'PLANIFIEZ VOTRE PROJET DE MAÇONNERIE' ),
        Field::make( 'textarea', 'contact_desc', __( 'Description', 'mbnl' ) )
            ->set_rows( 2 )
            ->set_default_value( 'Contactez-nous dès maintenant pour une soumission gratuite sous 24h.' ),
        Field::make( 'text', 'contact_btn_label', __( 'Bouton — texte', 'mbnl' ) )
            ->set_default_value( 'Demander une soumission' ),
        Field::make( 'text', 'contact_phone', __( 'Numéro de téléphone', 'mbnl' ) )
            ->set_default_value( '+14382252169' )
            ->set_help_text( 'Format : +1XXXXXXXXXX' ),
        Field::make( 'text', 'contact_form_url', __( 'URL du formulaire (iframe)', 'mbnl' ) )
            ->set_default_value( 'https://link.mbnl.ca/widget/form/moH2hI2EPNdYvgteSxeN' )
            ->set_help_text( 'URL GHL / Typeform / etc. à embarquer dans le modal.' ),
    ) )
    ->set_render_callback( function ( $fields ) {
        include get_template_directory() . '/template-parts/contact-cta.php';
    } );
