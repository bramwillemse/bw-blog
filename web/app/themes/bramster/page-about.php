<?php 
/* 
 * Template Name: Over mij 
 *
 */

get_header(); ?>

<article class="article article-about">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'inc/header-article' ); ?>

        <div class="l-container">
            <div class="l-column l-column-medium content">
                <div class="entry">
                    <?php the_content('Lees verder &raquo;'); ?>
                </div>

                <ul class="pitch">
                    <?php if ( have_rows('columns')) : 
                        $columns = get_field('columns');
                        while ( have_rows('columns') ) : the_row();

                    ?>

                        <li>
                            <h2><?php the_sub_field('title'); ?></h2>
                            <p><?php the_sub_field('text'); ?></p>
                        </li>

                    <?php endwhile;
                    endif; ?>
                </ul>
                
            </div><!-- /.column -->

            <?php get_template_part('inc/widgets-left'); ?>

        </div><!-- /.l-container -->
    
    <?php endwhile; ?>

    <?php else : ?>

        <h2 class="center">Niet gevonden</h2>
        <p class="center">Sorry, maar je zoekt naar een pagina die niet bestaan, probeer eens te zoeken rechtsboven op de site.</p>

    <?php endif; ?>
                
</article><!-- #article -->
       
<?php //get_template_part('inc/widgets-right'); ?>
                            
<?php get_footer(); ?>