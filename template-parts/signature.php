<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$signature_label   = ! empty( $f['signature_label'] ) ? $f['signature_label'] : 'Notre signature';
$signature_title   = ! empty( $f['signature_title'] ) ? $f['signature_title'] : 'La précision qui distingue les vrais maçons.';
$signature_desc    = ! empty( $f['signature_desc'] )  ? $f['signature_desc']  : 'Chaque projet porte notre exigence. Pas de compromis sur l\'alignement, les matériaux et la finition.';
$signature_pillars = ! empty( $f['signature_pillars'] ) ? $f['signature_pillars'] : null;
if ( empty( $signature_pillars ) ) {
    $signature_pillars = array(
        array( 'icon' => 'ruler',        'title' => 'Alignement parfait',   'desc' => 'Chaque brique posée avec une précision millimétrique.', 'stat' => '0.5', 'suffix' => 'mm', 'stat_label' => 'de tolérance', 'link' => '' ),
        array( 'icon' => 'layers',       'title' => 'Joints impeccables',   'desc' => 'Finition soignée pour un résultat durable et esthétique.', 'stat' => '100', 'suffix' => '%', 'stat_label' => 'de régularité', 'link' => '' ),
        array( 'icon' => 'hard-hat',     'title' => 'Gestion de chantier',  'desc' => 'Organisation rigoureuse et respect des échéanciers.', 'stat' => '0', 'suffix' => '', 'stat_label' => 'retard toléré', 'link' => '' ),
        array( 'icon' => 'shield-check', 'title' => 'Matériaux durables',   'desc' => 'Sélection de matériaux de première qualité.', 'stat' => '25', 'suffix' => '+', 'stat_label' => 'ans de durabilité', 'link' => '' ),
    );
}
?>
<!-- ═══ Signature Section ═══ -->
<section id="signature" class="section-signature">
    <!-- Decorative blobs -->
    <div class="signature-blob signature-blob--right"></div>
    <div class="signature-blob signature-blob--left"></div>

    <div class="container relative-z">
        <!-- Header -->
        <div class="signature-header" style="max-width: 64rem;">
            <div class="signature-label-row" data-aos="fade-right">
                <span class="signature-line"></span>
                <p class="signature-label"><?php echo esc_html( $signature_label ); ?></p>
            </div>

            <h2 class="signature-title" data-aos="fade-up" data-aos-delay="150">
                <?php echo nl2br( esc_html( $signature_title ) ); ?>
            </h2>

            <p class="signature-desc" data-aos="fade-up" data-aos-delay="300">
                <?php echo esc_html( $signature_desc ); ?>
            </p>
        </div>

        <!-- Separator -->
        <div class="signature-separator" data-aos="zoom-in-right" data-aos-delay="400"></div>

        <!-- Pillars grid -->
        <div class="pillars-grid">
            <?php foreach ( $signature_pillars as $i => $pillar ) : ?>
                <div class="pillar-card" data-aos="fade-up" data-aos-delay="<?php echo 300 + $i * 150; ?>">
                    <div class="pillar-accent-bar"></div>
                    <div class="pillar-icon">
                        <?php echo mbnl_get_icon( $pillar['icon'] ); ?>
                    </div>
                    <div class="pillar-stat-row">
                        <span class="pillar-stat"><?php echo esc_html( $pillar['stat'] ); ?></span>
                        <span class="pillar-suffix"><?php echo esc_html( $pillar['suffix'] ); ?></span>
                    </div>
                    <span class="pillar-stat-label"><?php echo esc_html( $pillar['stat_label'] ); ?></span>
                    <div class="pillar-divider">
                        <div class="pillar-divider-line"></div>
                        <div class="pillar-divider-accent"></div>
                    </div>
                    <h3 class="pillar-title"><?php echo esc_html( $pillar['title'] ); ?></h3>
                    <p class="pillar-desc"><?php echo esc_html( $pillar['desc'] ); ?></p>
                    <?php if ( ! empty( $pillar['link'] ) ) : ?>
                    <a href="<?php echo esc_url( $pillar['link'] ); ?>" class="pillar-arrow">
                        <span>Découvrir</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
