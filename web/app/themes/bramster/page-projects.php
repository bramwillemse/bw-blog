<?php 
/* 
 * Template Name: Projecten 
 *
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" class="article">    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="projects">
                <?php // Load selection of projects (ACF)
                $posts = get_field('select-projects');

                if( $posts ): ?>

                    <ul class="projects">
                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
                            setup_postdata($post); ?>
                            
                            <li class="project is-scaled">
                                <?php // Check for post thumbnail and set URL variable
                                if( has_post_thumbnail($post->ID) ) {
                                    $thumbid = get_post_thumbnail_id($post->ID);
                                    $img = wp_get_attachment_image_src( $thumbid, 'medium' ); 
                                    $relatedimg = $img[0];
                                } ?>
                                <a href="<?php the_permalink(); ?>" alt="Project <?php the_title(); ?>">
                                    <span class="child-image" style="background-image: url(<?php echo $relatedimg; ?>);">
                                    </span>
                                    <h2><?php the_title(); ?></h2>
                                </a>
                            </li>

                        <?php endforeach; ?> 
                    </ul>

                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
                                
            <div class="l-column l-column-big">
                <div class="entry">
                    <?php the_content(''); ?>
                </div>
            </div>

            <?php //get_template_part('inc/widgets-left'); ?>
    
    <?php endwhile; else : ?>

        <h2 class="center">Niet gevonden</h2>
        <p class="center">Sorry, maar je zoekt naar een pagina die niet bestaan, probeer eens te zoeken rechtsboven op de site.</p>

    <?php endif; ?>
                
</article><!-- #article -->
                                   
<?php get_footer(); ?>