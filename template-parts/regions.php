<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$regions_label = ! empty( $f['regions_label'] ) ? $f['regions_label'] : 'Régions';
$regions_title = ! empty( $f['regions_title'] ) ? $f['regions_title'] : 'Zones desservies';
$regions_desc  = ! empty( $f['regions_desc'] )  ? $f['regions_desc']  : 'Nous intervenons dans toute la région de Montréal, Laval, et sur la Rive-Nord.';
$regions_items = ! empty( $f['regions_items'] )  ? $f['regions_items'] : array(
    array( 'region_name' => 'Montréal' ),
    array( 'region_name' => 'Laval' ),
    array( 'region_name' => 'Rive-Nord' ),
    array( 'region_name' => 'Westmount' ),
    array( 'region_name' => 'Outremont' ),
    array( 'region_name' => 'Ville-Mont-Royal' ),
);
?>
<!-- ═══ Regions Section ═══ -->
<section id="regions" class="section-regions">
    <!-- Decorative elements -->
    <div class="regions-glow regions-glow--top"></div>
    <div class="regions-glow regions-glow--bottom"></div>

    <div class="container relative-z">
        <!-- Header -->
        <div class="regions-header" data-aos="fade-up">
            <div class="regions-label-row">
                <span class="regions-line"></span>
                <p class="regions-label"><?php echo esc_html( $regions_label ); ?></p>
                <span class="regions-line"></span>
            </div>

            <h2 class="regions-title"><?php echo esc_html( $regions_title ); ?></h2>

            <p class="regions-desc"><?php echo esc_html( $regions_desc ); ?></p>
        </div>

        <!-- Regions grid -->
        <div class="regions-grid">
            <?php foreach ( $regions_items as $i => $item ) : ?>
                <div class="region-card" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
                    <div class="region-card-icon">
                        <?php echo mbnl_get_icon( 'map-pin', 18 ); ?>
                    </div>
                    <span class="region-card-name"><?php echo esc_html( $item['region_name'] ); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
