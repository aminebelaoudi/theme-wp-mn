<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$hero_subtitle        = ! empty( $f['hero_subtitle'] )        ? $f['hero_subtitle']        : 'Maçonnerie & Béton New Look';
$hero_title           = ! empty( $f['hero_title'] )           ? $f['hero_title']           : 'Installation de brique, pierre et bloc de béton à Montréal, Laval et sur la Rive‑Nord';
$hero_description     = ! empty( $f['hero_description'] )     ? $f['hero_description']     : 'MBNL réalise des projets résidentiels, multilogements et commerciaux avec précision, alignement parfait et finitions haut de gamme.';
$hero_cta_label       = ! empty( $f['hero_cta_label'] )       ? $f['hero_cta_label']       : 'Demander une soumission';
$hero_cta_url         = ! empty( $f['hero_cta_url'] )         ? $f['hero_cta_url']         : '#contact';
$hero_secondary_label = ! empty( $f['hero_secondary_label'] ) ? $f['hero_secondary_label'] : 'Voir nos projets';
$hero_secondary_url   = ! empty( $f['hero_secondary_url'] )   ? $f['hero_secondary_url']   : '#realisations';
$hero_image           = ! empty( $f['hero_image'] )           ? wp_get_attachment_url( $f['hero_image'] ) : get_template_directory_uri() . '/images/hero-facade.jpg';
?>
<!-- ═══ Hero Section ═══ -->
<section class="hero-section">
    <!-- Background -->
    <div class="hero-bg">
        <img src="<?php echo esc_url( $hero_image ); ?>"
             alt="<?php echo esc_attr( $hero_subtitle ); ?>"
             class="hero-bg-img"
             loading="eager">
        <div class="hero-overlay"></div>
    </div>

    <!-- Content -->
    <div class="hero-content container" data-aos="fade-up" data-aos-duration="800">
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
            <?php echo esc_html( $hero_subtitle ); ?>
        </p>

        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
            <?php echo esc_html( $hero_title ); ?>
        </h1>

        <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
            <?php echo esc_html( $hero_description ); ?>
        </p>

        <div class="hero-actions" data-aos="fade-up" data-aos-delay="800">
            <a href="<?php echo esc_url( $hero_cta_url ); ?>" class="btn btn-cta btn-lg btn-rounded"><?php echo esc_html( $hero_cta_label ); ?></a>
            <a href="<?php echo esc_url( $hero_secondary_url ); ?>" class="btn btn-outline-light btn-lg btn-rounded"><?php echo esc_html( $hero_secondary_label ); ?></a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator" data-aos="fade" data-aos-delay="1500">
        <div class="scroll-mouse">
            <div class="scroll-dot"></div>
        </div>
    </div>
</section>
