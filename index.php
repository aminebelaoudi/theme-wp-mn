<?php
/**
 * Fallback index template
 */
get_header();
?>
<main id="main-content">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article class="container" style="padding: 6rem 1.5rem;">
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile;
else : ?>
    <div class="container text-center" style="padding: 6rem 1.5rem;">
        <h1>Aucun contenu trouvé</h1>
    </div>
<?php endif; ?>
</main>
<?php
get_footer();
