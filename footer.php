

<!-- ═══ Footer — Apple / Tesla Style ═══ -->
<footer class="site-footer">
    <div class="container">

<?php
// ─── Lire les options Carbon Fields ──────────────────────────
$ft_tagline      = carbon_get_theme_option( 'footer_tagline' )      ?: 'Maçonnerie &amp; Béton New Look — Experts en briques, pierres naturelles et blocs de béton depuis plus de 20&nbsp;ans.';
$ft_email        = carbon_get_theme_option( 'footer_email' )        ?: 'info@mbnl.ca';
$ft_phone        = carbon_get_theme_option( 'footer_phone' )        ?: '438.225.2169';
$ft_phone_raw    = carbon_get_theme_option( 'footer_phone_raw' )    ?: '+14382252169';
$ft_address      = carbon_get_theme_option( 'footer_address' )      ?: 'Montréal, QC';
$ft_facebook     = carbon_get_theme_option( 'footer_facebook' );
$ft_instagram    = carbon_get_theme_option( 'footer_instagram' );
$ft_linkedin     = carbon_get_theme_option( 'footer_linkedin' );
$ft_services     = carbon_get_theme_option( 'footer_services' )     ?: array();
$ft_sectors      = carbon_get_theme_option( 'footer_sectors' )      ?: array();
$ft_company      = carbon_get_theme_option( 'footer_company_name' ) ?: 'MBNL';
$ft_privacy_lbl  = carbon_get_theme_option( 'footer_privacy_label' ) ?: 'Politique de confidentialité';
$ft_privacy_url  = carbon_get_theme_option( 'footer_privacy_url' )  ?: '#';
$ft_terms_lbl    = carbon_get_theme_option( 'footer_terms_label' )  ?: "Conditions d'utilisation";
$ft_terms_url    = carbon_get_theme_option( 'footer_terms_url' )    ?: '#';

// Fallbacks si les listes sont vides
if ( empty( $ft_services ) ) {
    $ft_services = array(
        array( 'label' => 'Maçonnerie résidentielle', 'url' => '#services' ),
        array( 'label' => 'Maçonnerie commerciale',  'url' => '#services' ),
        array( 'label' => 'Rejointoiement',           'url' => '#services' ),
        array( 'label' => 'Pierre naturelle',         'url' => '#services' ),
        array( 'label' => 'Bloc de béton',            'url' => '#services' ),
    );
}
if ( empty( $ft_sectors ) ) {
    $ft_sectors = array(
        array( 'label' => 'Montréal',  'url' => '#services' ),
        array( 'label' => 'Laval',     'url' => '#services' ),
        array( 'label' => 'Rive-Nord', 'url' => '#services' ),
        array( 'label' => 'Westmount', 'url' => '#services' ),
        array( 'label' => 'Outremont', 'url' => '#services' ),
    );
}
?>

        <!-- Top row : brand + nav columns -->
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-col footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
                    <span class="footer-logo"><?php echo esc_html( $ft_company ); ?></span>
                </a>
                <p class="footer-tagline"><?php echo wp_kses_post( $ft_tagline ); ?></p>
            </div>

            <!-- Services -->
            <div class="footer-col">
                <h4 class="footer-heading">Services</h4>
                <ul class="footer-list">
                    <?php foreach ( $ft_services as $item ) : ?>
                        <li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Secteurs -->
            <div class="footer-col">
                <h4 class="footer-heading">Secteurs</h4>
                <ul class="footer-list">
                    <?php foreach ( $ft_sectors as $item ) : ?>
                        <li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4 class="footer-heading">Contact</h4>
                <ul class="footer-list footer-list--contact">
                    <li><a href="mailto:<?php echo esc_attr( $ft_email ); ?>"><?php echo esc_html( $ft_email ); ?></a></li>
                    <li><a href="tel:<?php echo esc_attr( $ft_phone_raw ); ?>"><?php echo esc_html( $ft_phone ); ?></a></li>
                    <li><?php echo esc_html( $ft_address ); ?></li>
                </ul>

                <?php if ( $ft_facebook || $ft_instagram || $ft_linkedin ) : ?>
                <div class="footer-social">
                    <?php if ( $ft_facebook ) : ?>
                    <a href="<?php echo esc_url( $ft_facebook ); ?>" class="footer-social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ( $ft_instagram ) : ?>
                    <a href="<?php echo esc_url( $ft_instagram ); ?>" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ( $ft_linkedin ) : ?>
                    <a href="<?php echo esc_url( $ft_linkedin ); ?>" class="footer-social-link" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Separator -->
        <div class="footer-divider"></div>

        <!-- Bottom bar -->
        <div class="footer-bottom">
            <p class="footer-copy">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $ft_company ); ?>. Tous droits réservés.</p>
            <div class="footer-legal">
                <?php if ( $ft_privacy_url && $ft_privacy_url !== '#' ) : ?>
                    <a href="<?php echo esc_url( $ft_privacy_url ); ?>"><?php echo esc_html( $ft_privacy_lbl ); ?></a>
                    <span class="footer-dot"></span>
                <?php endif; ?>
                <?php if ( $ft_terms_url && $ft_terms_url !== '#' ) : ?>
                    <a href="<?php echo esc_url( $ft_terms_url ); ?>"><?php echo esc_html( $ft_terms_lbl ); ?></a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</footer>

<?php
// ─── Modal formulaire global (disponible sur toutes les pages) ───
$modal_form_url = carbon_get_theme_option( 'footer_form_url' );
if ( ! $modal_form_url ) {
    $modal_form_url = 'https://link.mbnl.ca/widget/form/moH2hI2EPNdYvgteSxeN';
}
?>
<!-- Drawer Formulaire Contact — global -->
<div id="formsoumission" class="mbnl-modal" aria-modal="true" role="dialog" aria-label="Demander une soumission">
    <div class="mbnl-modal-overlay" role="button" tabindex="-1" aria-label="Fermer"></div>
    <div class="mbnl-modal-content">
        <div class="mbnl-modal-header">
            <span class="mbnl-modal-title">Demander une soumission</span>
            <button class="mbnl-modal-close" aria-label="Fermer">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="mbnl-modal-body">
            <iframe
                src="<?php echo esc_url( $modal_form_url ); ?>"
                title="Demander une soumission"
                loading="lazy"
            ></iframe>
            <script src="https://link.mbnl.ca/js/form_embed.js"></script>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
