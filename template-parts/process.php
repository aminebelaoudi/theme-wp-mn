<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$process_label = ! empty( $f['process_label'] ) ? $f['process_label'] : 'Notre processus';
$process_title = ! empty( $f['process_title'] ) ? $f['process_title'] : 'De la vision à la réalisation';
$process_steps = ! empty( $f['process_steps'] ) ? $f['process_steps'] : null;
if ( empty( $process_steps ) ) {
    $process_steps = array(
        array( 'num' => '01', 'title' => 'Analyse du projet' ),
        array( 'num' => '02', 'title' => 'Choix des matériaux' ),
        array( 'num' => '03', 'title' => 'Préparation du chantier' ),
        array( 'num' => '04', 'title' => 'Installation de la maçonnerie' ),
        array( 'num' => '05', 'title' => 'Inspection qualité' ),
        array( 'num' => '06', 'title' => 'Livraison finale' ),
    );
}
?>
<!-- ═══ Process Section ═══ -->
<section class="section-process">
    <div class="container">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $process_label ); ?></p>
            <h2 class="section-title text-center mb-20"><?php echo esc_html( $process_title ); ?></h2>
        </div>

        <div class="process-grid">
            <?php foreach ( $process_steps as $i => $step ) : ?>
                <div class="process-step" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                    <span class="process-num"><?php echo esc_html( $step['num'] ); ?></span>
                    <h3 class="process-title"><?php echo esc_html( $step['title'] ); ?></h3>
                    <div class="process-line"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
