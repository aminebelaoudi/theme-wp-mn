<?php
/**
 * Carbon Fields — Theme Options : Footer
 * Accessible dans WP Admin › Apparence › Options du footer
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Options du footer', 'mbnl' ) )
    ->set_page_parent( 'themes.php' )
    ->set_icon( 'dashicons-admin-links' )
    ->set_page_menu_title( __( 'Footer', 'mbnl' ) )
    ->add_tab( __( '🏷️ Logo', 'mbnl' ), array(

        Field::make( 'image', 'header_logo_image', __( 'Logo image (header & footer)', 'mbnl' ) )
            ->set_help_text( 'Si renseigné, remplace le texte du logo. Formats recommandés : SVG ou PNG transparent.' ),

        Field::make( 'text', 'header_logo_text', __( 'Texte du logo (fallback)', 'mbnl' ) )
            ->set_default_value( 'MBNL' )
            ->set_help_text( 'Affiché si aucune image n\'est choisie.' ),

        Field::make( 'text', 'header_logo_max_width', __( 'Largeur maximale du logo (px)', 'mbnl' ) )
            ->set_default_value( '160' )
            ->set_attribute( 'type', 'number' )
            ->set_attribute( 'min', '40' )
            ->set_attribute( 'max', '600' )
            ->set_help_text( 'Valeur en pixels. Défaut : 160.' ),

    ) )
    ->add_tab( __( '📞 Contact', 'mbnl' ), array(

        Field::make( 'text', 'footer_tagline', __( 'Accroche sous le logo', 'mbnl' ) )
            ->set_default_value( 'Maçonnerie & Béton New Look — Experts en briques, pierres naturelles et blocs de béton depuis plus de 20 ans.' )
            ->set_help_text( 'Courte description affichée sous le nom MBNL dans le footer.' ),

        Field::make( 'text', 'footer_email', __( 'Adresse e-mail', 'mbnl' ) )
            ->set_default_value( 'info@mbnl.ca' )
            ->set_attribute( 'type', 'email' ),

        Field::make( 'text', 'footer_phone', __( 'Numéro de téléphone (affiché)', 'mbnl' ) )
            ->set_default_value( '438.225.2169' )
            ->set_help_text( 'Ex : 438.225.2169' ),

        Field::make( 'text', 'footer_phone_raw', __( 'Numéro de téléphone (lien tel:)', 'mbnl' ) )
            ->set_default_value( '+14382252169' )
            ->set_help_text( 'Sans espaces ni tirets. Ex : +14382252169' ),

        Field::make( 'text', 'footer_address', __( 'Adresse / Ville', 'mbnl' ) )
            ->set_default_value( 'Montréal, QC' ),

    ) )
    ->add_tab( __( '� Formulaire', 'mbnl' ), array(

        Field::make( 'text', 'footer_form_url', __( 'URL du formulaire de soumission', 'mbnl' ) )
            ->set_default_value( 'https://link.mbnl.ca/widget/form/moH2hI2EPNdYvgteSxeN' )
            ->set_help_text( 'URL GHL / Typeform / etc. embarquée dans le modal global "Demander une soumission".' ),

    ) )
    ->add_tab( __( '�🔗 Réseaux sociaux', 'mbnl' ), array(

        Field::make( 'text', 'footer_facebook', __( 'URL Facebook', 'mbnl' ) )
            ->set_attribute( 'placeholder', 'https://facebook.com/...' ),

        Field::make( 'text', 'footer_instagram', __( 'URL Instagram', 'mbnl' ) )
            ->set_attribute( 'placeholder', 'https://instagram.com/...' ),

        Field::make( 'text', 'footer_linkedin', __( 'URL LinkedIn', 'mbnl' ) )
            ->set_attribute( 'placeholder', 'https://linkedin.com/...' ),

    ) )
    ->add_tab( __( '🧱 Services', 'mbnl' ), array(

        Field::make( 'complex', 'footer_services', __( 'Liens Services', 'mbnl' ) )
            ->set_help_text( 'Ajoutez ou réorganisez les liens du bloc "Services" dans le footer.' )
            ->set_max( 8 )
            ->add_fields( array(
                Field::make( 'text', 'label', __( 'Nom du service', 'mbnl' ) )
                    ->set_attribute( 'placeholder', 'Maçonnerie résidentielle' ),
                Field::make( 'text', 'url', __( 'Lien (URL ou #ancre)', 'mbnl' ) )
                    ->set_attribute( 'placeholder', '#services' ),
            ) )
            ->set_default_value( array(
                array( 'label' => 'Maçonnerie résidentielle', 'url' => '#services' ),
                array( 'label' => 'Maçonnerie commerciale',  'url' => '#services' ),
                array( 'label' => 'Rejointoiement',          'url' => '#services' ),
                array( 'label' => 'Pierre naturelle',        'url' => '#services' ),
                array( 'label' => 'Bloc de béton',           'url' => '#services' ),
            ) ),

    ) )
    ->add_tab( __( '📍 Secteurs', 'mbnl' ), array(

        Field::make( 'complex', 'footer_sectors', __( 'Zones desservies', 'mbnl' ) )
            ->set_help_text( 'Ajoutez ou réorganisez les villes affichées dans la colonne "Secteurs".' )
            ->set_max( 8 )
            ->add_fields( array(
                Field::make( 'text', 'label', __( 'Nom de la ville / région', 'mbnl' ) )
                    ->set_attribute( 'placeholder', 'Montréal' ),
                Field::make( 'text', 'url', __( 'Lien (URL ou #ancre)', 'mbnl' ) )
                    ->set_attribute( 'placeholder', '#services' ),
            ) )
            ->set_default_value( array(
                array( 'label' => 'Montréal',  'url' => '#services' ),
                array( 'label' => 'Laval',     'url' => '#services' ),
                array( 'label' => 'Rive-Nord', 'url' => '#services' ),
                array( 'label' => 'Westmount', 'url' => '#services' ),
                array( 'label' => 'Outremont', 'url' => '#services' ),
            ) ),

    ) )
    ->add_tab( __( '⚖️ Mentions légales', 'mbnl' ), array(

        Field::make( 'text', 'footer_company_name', __( 'Nom société (copyright)', 'mbnl' ) )
            ->set_default_value( 'MBNL' ),

        Field::make( 'text', 'footer_privacy_label', __( 'Lien confidentialité — texte', 'mbnl' ) )
            ->set_default_value( 'Politique de confidentialité' ),

        Field::make( 'text', 'footer_privacy_url', __( 'Lien confidentialité — URL', 'mbnl' ) )
            ->set_attribute( 'placeholder', '/politique-de-confidentialite' ),

        Field::make( 'text', 'footer_terms_label', __( "Conditions — texte", 'mbnl' ) )
            ->set_default_value( "Conditions d'utilisation" ),

        Field::make( 'text', 'footer_terms_url', __( "Conditions — URL", 'mbnl' ) )
            ->set_attribute( 'placeholder', '/conditions-utilisation' ),

    ) );
