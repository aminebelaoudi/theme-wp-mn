<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$sv_label    = ! empty( $f['sv_label'] )    ? $f['sv_label']    : 'Nos services';
$sv_title    = ! empty( $f['sv_title'] )    ? $f['sv_title']    : 'Services par région';
$sv_sections = ! empty( $f['sv_sections'] ) ? $f['sv_sections'] : array();
?>
<!-- ═══ Services par ville ═══ -->
<section id="services-villes" class="section-sv">
    <!-- Decorative blobs -->
    <div class="sv-blob sv-blob--right"></div>
    <div class="sv-blob sv-blob--left"></div>

    <div class="container relative-z">
        <!-- Global header -->
        <div class="sv-header" data-aos="fade-up">
            <div class="sv-label-row">
                <span class="sv-line"></span>
                <p class="sv-label"><?php echo esc_html( $sv_label ); ?></p>
            </div>

            <h2 class="sv-main-title" data-aos="fade-up" data-aos-delay="150">
                <?php echo esc_html( $sv_title ); ?>
            </h2>
        </div>

        <!-- Separator -->
        <div class="sv-separator" data-aos="zoom-in-right" data-aos-delay="300"></div>

        <?php if ( ! empty( $sv_sections ) ) : ?>
            <?php foreach ( $sv_sections as $si => $section ) :
                $cat_id = ! empty( $section['sv_category'] ) ? (int) $section['sv_category'] : 0;
                if ( ! $cat_id ) continue;

                $cat = get_category( $cat_id );
                if ( ! $cat || is_wp_error( $cat ) ) continue;

                $pages = get_posts( array(
                    'post_type'      => 'page',
                    'post_status'    => 'publish',
                    'category'       => $cat_id,
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ) );
            ?>
                <div class="sv-city-block" data-aos="fade-up" data-aos-delay="<?php echo 200 + $si * 100; ?>">
                    <div class="sv-city-header">
                        <div class="sv-city-icon">
                            <?php echo mbnl_get_icon( 'map-pin', 20 ); ?>
                        </div>
                        <h3 class="sv-city-name"><?php echo esc_html( $cat->name ); ?></h3>
                    </div>

                    <?php if ( ! empty( $pages ) ) : ?>
                        <div class="sv-pages-grid">
                            <?php foreach ( $pages as $pi => $p ) : ?>
                                <a href="<?php echo esc_url( get_permalink( $p->ID ) ); ?>"
                                   class="sv-page-card"
                                   data-aos="fade-up"
                                   data-aos-delay="<?php echo 100 + $pi * 60; ?>">
                                    <span class="sv-page-title"><?php echo esc_html( get_the_title( $p->ID ) ); ?></span>
                                    <span class="sv-page-arrow">
                                        <?php echo mbnl_get_icon( 'arrow-up-right', 14 ); ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p class="sv-empty">Aucun service pour cette ville.</p>
                    <?php endif; ?>
                </div>

                <?php if ( $si < count( $sv_sections ) - 1 ) : ?>
                    <div class="sv-city-divider"></div>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php else : ?>
            <p class="sv-empty" data-aos="fade-up">Ajoutez des sections par ville dans l'éditeur pour afficher les services.</p>
        <?php endif; ?>
    </div>
</section>
