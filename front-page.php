<?php
/**
 * Template Name: Page d'accueil MBNL
 * Front page template
 */
get_header();
?>
<main id="main-content">
<?php
if ( have_posts() ) : the_post();
    if ( has_blocks( get_the_ID() ) ) {
        // Rendu des blocs Gutenberg (Carbon Fields)
        the_content();
    } else {
        // Fallback statique (aucun bloc ajouté)
        get_template_part( 'template-parts/hero' );
        get_template_part( 'template-parts/services' );
        get_template_part( 'template-parts/why' );
        get_template_part( 'template-parts/signature' );
        get_template_part( 'template-parts/process' );
        get_template_part( 'template-parts/realisations' );
        get_template_part( 'template-parts/testimonials' );
        get_template_part( 'template-parts/faq' );
    }
endif;
?>
</main>
<?php
get_footer();
