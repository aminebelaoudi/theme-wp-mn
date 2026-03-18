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

        <div class="testimonials-grid">
            <?php foreach ( $testi_items as $i => $t ) : ?>
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="<?php echo $i * 150; ?>">
                    <div class="testimonial-stars">
                        <?php for ( $j = 0; $j < 5; $j++ ) : ?>
                            <svg class="star-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <blockquote class="testimonial-quote">&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</blockquote>
                    <div class="testimonial-author">
                        <p class="testimonial-name"><?php echo esc_html( $t['author'] ); ?></p>
                        <p class="testimonial-location"><?php echo esc_html( $t['location'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
