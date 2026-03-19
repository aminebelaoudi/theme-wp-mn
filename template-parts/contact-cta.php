<?php
// ─── Block fields (Carbon Fields) or fallback defaults ───
$f = isset( $fields ) ? $fields : array();
$contact_label     = ! empty( $f['contact_label'] )     ? $f['contact_label']     : 'Commencez ici';
$contact_title     = ! empty( $f['contact_title'] )     ? $f['contact_title']     : 'PLANIFIEZ VOTRE PROJET DE MAÇONNERIE';
$contact_desc      = ! empty( $f['contact_desc'] )      ? $f['contact_desc']      : 'Contactez-nous dès maintenant pour une soumission gratuite sous 24h.';
$contact_btn_label = ! empty( $f['contact_btn_label'] ) ? $f['contact_btn_label'] : 'Demander une soumission';
$contact_phone     = ! empty( $f['contact_phone'] )     ? $f['contact_phone']     : '+15141234567';
$contact_form_url  = ! empty( $f['contact_form_url'] )  ? $f['contact_form_url']  : 'https://link.mbnl.ca/widget/form/moH2hI2EPNdYvgteSxeN';
?>
<!-- ═══ Contact CTA ═══ -->
<section id="contact" class="section-contact">
    <div class="container text-center" style="max-width: 42rem;">
        <div data-aos="fade-up">
            <p class="section-label"><?php echo esc_html( $contact_label ); ?></p>
            <h2 class="section-title text-white"><?php echo esc_html( $contact_title ); ?></h2>
            <p class="text-white-50 mb-10"><?php echo esc_html( $contact_desc ); ?></p>
        </div>
        <div data-aos="fade-up" data-aos-delay="200">
            <button class="btn btn-cta btn-lg btn-rounded" data-modal-open="formsoumission">
                <?php echo esc_html( $contact_btn_label ); ?>
                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
        </div>
    </div>

    <!-- Drawer Formulaire Contact -->
    <div id="formsoumission" class="mbnl-modal" aria-modal="true" role="dialog" aria-label="<?php echo esc_attr( $contact_btn_label ); ?>">
        <div class="mbnl-modal-overlay" role="button" tabindex="-1" aria-label="Fermer"></div>
        <div class="mbnl-modal-content">
            <div class="mbnl-modal-header">
                <span class="mbnl-modal-title"><?php echo esc_html( $contact_btn_label ); ?></span>
                <button class="mbnl-modal-close" aria-label="Fermer">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="mbnl-modal-body">
                <iframe
                    src="<?php echo esc_url( $contact_form_url ); ?>"
                    title="<?php echo esc_attr( $contact_btn_label ); ?>"
                    loading="lazy"
                ></iframe>
                <script src="https://link.mbnl.ca/js/form_embed.js"></script>
            </div>
        </div>
    </div>
</section>
