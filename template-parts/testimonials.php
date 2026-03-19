<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$testi_label = ! empty( $f['testimonials_label'] ) ? $f['testimonials_label'] : 'Témoignages';
$testi_title = ! empty( $f['testimonials_title'] ) ? $f['testimonials_title'] : 'Ce que nos clients disent';
$testi_items = ! empty( $f['testimonials_items'] ) ? $f['testimonials_items'] : null;
if ( empty( $testi_items ) ) {
    $testi_items = array(
        array( 'quote' => 'Travail exceptionnel et finition parfaite. L\'équipe MBNL a transformé notre façade avec un souci du détail remarquable.', 'author' => 'M. Tremblay', 'location' => 'Westmount' ),
        array( 'quote' => 'Équipe professionnelle et chantier impeccable. Le résultat dépasse nos attentes. Je recommande sans hésitation.',            'author' => 'Mme Dubois',  'location' => 'Outremont' ),
    );
}
?>
<!-- ═══ Testimonials Section ═══ -->
<section class="section-testimonials">
    <div class="container">
        <div data-aos="fade-up">
            <p class="section-label text-center"><?php echo esc_html( $testi_label ); ?></p>
            <h2 class="section-title text-center mb-16"><?php echo esc_html( $testi_title ); ?></h2>
        </div>

        <!-- Google Reviews Widget -->
        <div class="testimonials-widget" data-aos="fade-up">
            <script type="text/javascript" src="https://link.mbnl.ca/reputation/assets/review-widget.js"></script>
            <iframe class="lc_reviews_widget" src="https://link.mbnl.ca/reputation/widgets/review_widget/CU0M7TQn9KbVeP5bzYNV" frameborder="0" scrolling="no" style="min-width: 100%; width: 100%;"></iframe>
        </div>
    </div>
</section>
