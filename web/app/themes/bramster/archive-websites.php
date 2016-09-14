<?php 
/* 
 * Template Name: Projects 
 *
 */

get_header(); ?>



<article id="post-<?php the_ID(); ?>" class="article">    
    <?php 
    // WP_Query arguments
    $args = array (
        'post_type'              => 'websites',
        'pagination'             => false,
        'posts_per_page'         => '99',
        'orderby'                => 'menu_order',
        'order'                  => 'ASC'
    );

    // The Query
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) : ?> 

        <ul class="projects">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                    
                <li class="project tzfix">
                    <?php // Check for post thumbnail and set URL variable
                    if( has_post_thumbnail($post->ID) ) {
                        $thumbid = get_post_thumbnail_id($post->ID);
                        $img = wp_get_attachment_image_src( $thumbid, 'medium' ); 
                        $relatedimg = $img[0];
                    } ?>
                    <a href="<?php the_permalink(); ?>">
                        <span class="child-image tzfix" style="background-image: url(<?php echo $relatedimg; ?>);">
                        </span>
                        <h2 class="tzfix"><?php the_title(); ?></h2>
                    </a>
                </li>

            <?php endwhile; ?>
        </ul><!-- /.projects -->

    <?php wp_reset_postdata(); ?>
    <?php else : ?>

        <h2 class="center">Niet gevonden</h2>
        <p class="center">Sorry, maar je zoekt naar een pagina die niet bestaan, probeer eens te zoeken rechtsboven op de site.</p>

    <?php endif; ?>

    <div class="l-column l-column-big">
        <div class="entry">
            <?php the_field('text-websites', 'options'); ?>
        </div>
    </div>    
                
</article><!-- #article -->
                                   
<?php get_footer(); ?>