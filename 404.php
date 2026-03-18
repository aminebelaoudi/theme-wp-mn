<?php
/**
 * 404 page
 */
get_header();
?>
<main id="main-content">
<section class="hero-section" style="min-height: 80vh;">
    <div class="hero-bg" style="background: hsl(0 0% 7%);"></div>
    <div class="hero-content container text-center" style="position: relative; z-index: 10;">
        <h1 class="hero-title" style="font-size: 6rem; margin-bottom: 1rem;">404</h1>
        <p class="hero-description" style="margin-bottom: 2rem;">Page non trouvée</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-cta btn-lg btn-rounded">
            Retour à l'accueil
        </a>
    </div>
</section>
</main>
<?php
get_footer();
