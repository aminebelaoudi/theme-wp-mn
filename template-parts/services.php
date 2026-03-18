<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$services_label       = ! empty( $f['services_label'] )       ? $f['services_label']       : 'Nos services';
$services_title       = ! empty( $f['services_title'] )       ? $f['services_title']       : 'Expertise en maçonnerie';
$services_title_color = ! empty( $f['services_title_color'] ) ? $f['services_title_color'] : '';
$services_desc        = ! empty( $f['services_desc'] )        ? $f['services_desc']        : '';
$services_btn_label   = ! empty( $f['services_btn_label'] )   ? $f['services_btn_label']   : '';
$services_btn_url     = ! empty( $f['services_btn_url'] )     ? $f['services_btn_url']     : '#contact';
$services_items       = ! empty( $f['services_items'] )       ? $f['services_items']       : null;
if ( empty( $services_items ) ) {
    $services_items = array(
        array( 'image' => null, 'title' => 'Installation de brique',            'description' => 'Pose de briques architecturales pour maisons, triplex et immeubles résidentiels.',   'link' => '', '_fallback_img' => get_template_directory_uri() . '/images/brick-work.jpg' ),
        array( 'image' => null, 'title' => 'Installation de pierre naturelle',  'description' => 'Façades haut de gamme en pierre naturelle et pierre d\'ingénierie.',                   'link' => '', '_fallback_img' => get_template_directory_uri() . '/images/stone-natural.jpg' ),
        array( 'image' => null, 'title' => 'Installation de blocs de béton',   'description' => 'Construction de murs structuraux pour multilogements et bâtiments commerciaux.',      'link' => '', '_fallback_img' => get_template_directory_uri() . '/images/concrete-blocks.jpg' ),
    );
}
$title_style = $services_title_color ? 'color:' . esc_attr( $services_title_color ) : '';
?>
<!-- ═══ Services Section ═══ -->
<section id="services" class="section-services">
    <div class="container">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $services_label ); ?></p>
            <h2 class="section-title text-center<?php echo $services_desc ? '' : ' mb-16'; ?>"<?php echo $title_style ? ' style="' . $title_style . '"' : ''; ?>><?php echo esc_html( $services_title ); ?></h2>
            <?php if ( $services_desc ) : ?>
                <p class="services-desc text-center mb-16"><?php echo esc_html( $services_desc ); ?></p>
            <?php endif; ?>
        </div>

        <div class="services-grid">
            <?php foreach ( $services_items as $i => $service ) :
                $img_url = ! empty( $service['image'] ) ? wp_get_attachment_url( $service['image'] ) : '';
                if ( ! $img_url && ! empty( $service['_fallback_img'] ) ) { $img_url = $service['_fallback_img']; }
            ?>
                <div class="service-card" data-aos="fade-up" data-aos-delay="<?php echo $i * 150; ?>">
                    <div class="service-card-image">
                        <img src="<?php echo esc_url( $img_url ); ?>"
                             alt="<?php echo esc_attr( $service['title'] ); ?>"
                             loading="lazy">
                    </div>
                    <div class="service-card-body">
                        <h3 class="service-card-title"><?php echo esc_html( $service['title'] ); ?></h3>
                        <p class="service-card-desc"><?php echo esc_html( $service['description'] ); ?></p>
                        <?php if ( ! empty( $service['link'] ) ) : ?>
                        <a href="<?php echo esc_url( $service['link'] ); ?>" class="service-card-link">
                            <span>En savoir plus</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ( $services_btn_label ) : ?>
        <div class="services-footer" data-aos="fade-up">
            <a href="<?php echo esc_url( $services_btn_url ); ?>" class="btn btn-cta btn-lg btn-rounded">
                <?php echo esc_html( $services_btn_label ); ?>
                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
