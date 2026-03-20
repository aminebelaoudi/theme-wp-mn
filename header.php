<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MBNL — Installation de brique, pierre naturelle et bloc de béton à Montréal, Laval et Rive-Nord.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ═══ Navbar ═══ -->
<header id="site-header" class="site-header">
    <nav class="nav-container container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
            <span class="logo-text">MBNL</span>
        </a>

        <!-- Desktop nav -->
        <div class="nav-desktop">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu-list',
                'depth'          => 2,
                'fallback_cb'    => function() {
                    echo '<a href="#services" class="nav-link">Services</a>';
                    echo '<a href="#realisations" class="nav-link">Réalisations</a>';
                    echo '<a href="#signature" class="nav-link">À propos</a>';
                    echo '<a href="#contact" class="nav-link">Contact</a>';
                },
                'walker'         => new MBNL_Nav_Walker(),
            ) );
            ?>
            <button class="btn btn-cta btn-sm btn-rounded" data-modal-open="formsoumission">Demander une soumission</button>
        </div>

        <!-- Mobile toggle -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Menu">
            <span class="hamburger"></span>
        </button>
    </nav>

    <!-- Mobile menu -->
    <div class="nav-mobile" id="nav-mobile">
        <div class="nav-mobile-inner">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-mobile-list',
                'depth'          => 2,
                'fallback_cb'    => function() {
                    echo '<a href="#services" class="nav-mobile-link">Services</a>';
                    echo '<a href="#realisations" class="nav-mobile-link">Réalisations</a>';
                    echo '<a href="#signature" class="nav-mobile-link">À propos</a>';
                    echo '<a href="#contact" class="nav-mobile-link">Contact</a>';
                },
                'walker'         => new MBNL_Mobile_Nav_Walker(),
            ) );
            ?>
            <button class="btn btn-cta btn-rounded" data-modal-open="formsoumission" style="margin-top: 0.5rem;">Demander une soumission</button>
        </div>
    </div>
</header>
