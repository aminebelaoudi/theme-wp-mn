<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$about_label     = ! empty( $f['about_label'] )     ? $f['about_label']     : 'À propos';
$about_title     = ! empty( $f['about_title'] )     ? $f['about_title']     : 'Une équipe passionnée, des résultats durables.';
$about_text      = ! empty( $f['about_text'] )      ? $f['about_text']      : '<p>Depuis plus de <strong>15 ans</strong>, Maçonnerie & Béton New Look accompagne les propriétaires résidentiels, les gestionnaires de multilogements et les entreprises commerciales dans leurs projets de maçonnerie à Montréal, Laval et sur la Rive-Nord.</p><p>Notre expertise couvre l\'installation de brique, de pierre et de bloc de béton, le rejointoiement, ainsi que la réparation et la restauration de façades. Chaque chantier est mené avec rigueur, souci du détail et un engagement total envers la qualité.</p>';
$about_image     = ! empty( $f['about_image'] )     ? wp_get_attachment_url( $f['about_image'] ) : get_template_directory_uri() . '/images/hero-facade.jpg';
$about_cta_label = ! empty( $f['about_cta_label'] ) ? $f['about_cta_label'] : 'Demander une soumission';
$about_cta_url   = ! empty( $f['about_cta_url'] )   ? $f['about_cta_url']   : '#contact';
$about_stats     = ! empty( $f['about_stats'] )      ? $f['about_stats']     : array(
    array( 'stat_value' => '15+',  'stat_label' => 'Années d\'expérience' ),
    array( 'stat_value' => '500+', 'stat_label' => 'Projets réalisés' ),
    array( 'stat_value' => '100%', 'stat_label' => 'Satisfaction client' ),
);
?>
<!-- ═══ About Section ═══ -->
<section id="a-propos" class="section-about">
    <!-- Decorative blob -->
    <div class="about-blob"></div>

    <div class="container relative-z">
        <div class="about-grid">
            <!-- Image column -->
            <div class="about-image-col" data-aos="fade-right" data-aos-duration="800">
                <div class="about-image-wrapper">
                    <img src="<?php echo esc_url( $about_image ); ?>"
                         alt="<?php echo esc_attr( $about_title ); ?>"
                         class="about-image"
                         loading="lazy">
                    <div class="about-image-accent"></div>
                </div>
            </div>

            <!-- Text column -->
            <div class="about-text-col" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="about-label-row">
                    <span class="about-line"></span>
                    <p class="about-label"><?php echo esc_html( $about_label ); ?></p>
                </div>

                <h2 class="about-title"><?php echo nl2br( esc_html( $about_title ) ); ?></h2>

                <div class="about-body">
                    <?php echo wp_kses_post( $about_text ); ?>
                </div>

                <!-- Stats -->
                <?php if ( ! empty( $about_stats ) ) : ?>
                <div class="about-stats" data-aos="fade-up" data-aos-delay="400">
                    <?php foreach ( $about_stats as $stat ) : ?>
                        <div class="about-stat">
                            <span class="about-stat-value"><?php echo esc_html( $stat['stat_value'] ); ?></span>
                            <span class="about-stat-label"><?php echo esc_html( $stat['stat_label'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- CTA -->
                <div class="about-cta" data-aos="fade-up" data-aos-delay="500">
                    <a href="<?php echo esc_url( $about_cta_url ); ?>" class="btn btn-cta btn-lg btn-rounded">
                        <?php echo esc_html( $about_cta_label ); ?>
                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
