<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" class="article">
    <div class="l-container">
        <div class="l-column l-column-big content">
            <h1>Huh?!</h1>

            <div class="entry">
				<p>Deze pagina bestaat niet. Het spijt me... Neem <a href="mailto:contact@bramwillemse.nl">contact</a> met me op als je er echt niet van kunt slapen!</p>
            </div>
        </div><!-- /.column -->

        <?php //get_template_part('inc/widgets-left'); ?>

    </div><!-- /.container-content -->
                
</article><!-- #article -->

<?php get_footer(); ?>