<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$real_label = ! empty( $f['realisations_label'] ) ? $f['realisations_label'] : 'Portfolio';
$real_title = ! empty( $f['realisations_title'] ) ? $f['realisations_title'] : 'Nos réalisations';
$real_items = ! empty( $f['realisations_items'] ) ? $f['realisations_items'] : null;
if ( empty( $real_items ) ) {
    $real_items = array(
        array( 'image' => null, 'title' => 'Projet Westmount', 'category' => 'Façade pierre naturelle', 'featured' => 'yes', '_fallback_img' => get_template_directory_uri() . '/images/project-westmount.jpg' ),
        array( 'image' => null, 'title' => 'Projet Outremont', 'category' => 'Brique architecturale',  'featured' => '',    '_fallback_img' => get_template_directory_uri() . '/images/project-outremont.jpg' ),
        array( 'image' => null, 'title' => 'Projet Laval',     'category' => 'Bloc architectural',    'featured' => '',    '_fallback_img' => get_template_directory_uri() . '/images/project-laval.jpg' ),
    );
}
?>
<!-- ═══ Réalisations Section ═══ -->
<section id="realisations" class="section-realisations">
    <div class="container">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $real_label ); ?></p>
            <h2 class="section-title text-center mb-16"><?php echo esc_html( $real_title ); ?></h2>
        </div>

        <div class="realisations-grid">
            <?php foreach ( $real_items as $i => $project ) :
                $featured_class = ! empty( $project['featured'] ) ? 'realisation-card--large' : '';
                $img_url = ! empty( $project['image'] ) ? wp_get_attachment_url( $project['image'] ) : '';
                if ( ! $img_url && ! empty( $project['_fallback_img'] ) ) { $img_url = $project['_fallback_img']; }
            ?>
                <div class="realisation-card <?php echo esc_attr( $featured_class ); ?>"
                     data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                    <img src="<?php echo esc_url( $img_url ); ?>"
                         alt="<?php echo esc_attr( $project['title'] ); ?>"
                         loading="lazy">
                    <div class="realisation-overlay">
                        <div>
                            <h3 class="realisation-title"><?php echo esc_html( $project['title'] ); ?></h3>
                            <p class="realisation-cat"><?php echo esc_html( $project['category'] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
