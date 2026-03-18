<?php
/**
 * Template pour les pages WordPress standard
 */
get_header();
?>
<main id="main-content">
<?php
if ( have_posts() ) : the_post();
    if ( has_blocks( get_the_ID() ) ) {
        // ─── Rendu des blocs Gutenberg / Carbon Fields ───
        the_content();
    } else {
        // ─── Fallback : contenu classique ───────────────
        ?>
        <article class="container" style="padding: 8rem 1.5rem;">
            <h1 style="font-size:2rem; font-weight:700; margin-bottom:1.5rem;">
                <?php the_title(); ?>
            </h1>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    }
endif;
?>
</main>
<?php
get_footer();
