<?php get_header(); ?>

<section class="l-container l-container-content">
    <div class="l-column content">            
        <?php if (have_posts()) : while (have_posts()) : the_post();
            global $more;    // Declare global $more (before the loop).
            $more = 0;       // Set (inside the loop) to display content above the more tag.
            //The code must be inserted ahead of the call the_content, but AFTER the_post() ?>

            <?php // Load Featured Image data
            $thumbid = get_post_thumbnail_id($post->ID); 
            $img = wp_get_attachment_image_src( $thumbid, 'medium' );
            $headerimg = $img[0]; ?>

            <article class="article" id="post-<?php the_ID(); ?>">    

                <header class="header">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                </header>

                <div class="entry">
                    <span class="date"><?php the_time('j F Y'); ?> -</span>
                    <?php the_content(' '); ?>
                </div><!-- /.reacties -->

                <footer class="postmetadata">
                    <?php the_category(''); ?>
                    <a href="<?php the_permalink(); ?>" class="more-link is-scaled">Lees verder <span class="ss-icon ss-standard">&#x25BB;</span></a>
                </footer><!-- /.postmetadata -->
            </article>
        <?php endwhile; ?>
            
            <div class="navigation">
                <?php html5wp_pagination(); ?>
            </div>

        <?php else : ?>
            <h2>He bah!</h2>
            <p>Deze pagina bestaat niet. Het spijt me...</p>
        <?php endif; ?> 
                                
    </div><!-- #tijdlijn -->

    <?php get_template_part('inc/widgets-left'); ?>

</section><!-- /.container-content -->

<?php get_template_part('inc/widgets-right'); ?>
                    
<?php get_footer(); ?>