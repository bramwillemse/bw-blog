<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" class="article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'inc/header-article' ); ?>

        <div class="l-container l-container-content">
            <div class="l-column content">
    			<div class="entry">
                    <span class="date"><?php the_time('j F Y'); ?> - </span>
                    <?php the_content('Lees verder &raquo;'); ?>
                </div><!-- /.entry -->

                <footer class="postmetadata">
                    	<?php the_category(' '); ?>
                </footer><!-- /.postmetadata -->

            </div><!-- /.column -->

            <?php get_template_part('inc/widgets-left'); ?>

        </div><!-- /.container-content -->

	<?php endwhile; ?>
    <?php else : ?>

        <h2 class="center">Niet gevonden</h2>
        <p class="center">Sorry, maar je zoekt naar een pagina die niet bestaan, probeer eens te zoeken rechtsboven op de site.</p>

    <?php endif; ?>

</article><!-- #article -->

<?php get_template_part('inc/widgets-right'); ?>

<?php get_footer(); ?>
