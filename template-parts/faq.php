<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$faq_label = ! empty( $f['faq_label'] ) ? $f['faq_label'] : 'FAQ';
$faq_title = ! empty( $f['faq_title'] ) ? $f['faq_title'] : 'Questions fréquentes';
$faq_items = ! empty( $f['faq_items'] ) ? $f['faq_items'] : null;
if ( empty( $faq_items ) ) {
    $faq_items = array(
        array( 'q' => 'Combien coûte un projet de maçonnerie ?',       'a' => 'Le coût dépend de plusieurs facteurs : le type de matériau, la surface à couvrir et la complexité du projet. Nous offrons des soumissions gratuites et détaillées pour chaque projet.' ),
        array( 'q' => 'Quel matériau choisir pour une façade ?',        'a' => 'Le choix dépend de votre budget, de l\'esthétique souhaitée et de la durabilité requise. La brique offre un excellent rapport qualité-prix, tandis que la pierre naturelle offre un cachet incomparable.' ),
        array( 'q' => 'Quels délais pour un projet ?',                  'a' => 'Les délais varient selon l\'envergure du projet. Un projet résidentiel standard prend entre 2 à 4 semaines. Nous respectons toujours les échéanciers convenus.' ),
        array( 'q' => 'Travaillez-vous avec des entrepreneurs généraux ?', 'a' => 'Oui, nous collaborons régulièrement avec des entrepreneurs généraux sur des projets résidentiels et commerciaux. Nous nous adaptons à vos processus de gestion de projet.' ),
    );
}
?>
<!-- ═══ FAQ Section ═══ -->
<section class="section-faq">
    <div class="container" style="max-width: 48rem;">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $faq_label ); ?></p>
            <h2 class="section-title text-center mb-16"><?php echo esc_html( $faq_title ); ?></h2>
        </div>

        <div class="faq-list" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ( $faq_items as $faq ) : ?>
                <div class="faq-item">
                    <button class="faq-trigger" aria-expanded="false">
                        <span><?php echo esc_html( $faq['q'] ); ?></span>
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="faq-content">
                        <p><?php echo esc_html( $faq['a'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
