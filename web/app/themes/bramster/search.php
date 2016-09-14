<?php get_header(); ?>

	<section id="tijdlijn" class="archive">

	<?php if (have_posts()) : ?>

		<h1 class="catTitel">Zoekresultaten</h1>

            <?php while (have_posts()) : the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <small><?php the_time('j F Y') ?> <?php edit_post_link('edit', ' | ', ''); ?></small>
    
                    <div class="entry">
                        <?php the_content('Lees verder &raquo;'); ?>
                    </div>
                    
                    <div id="share">
                        <script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>                
                        <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;via=bramwillemse" class="twitter-share-button" data-count="horizontal" data-via="bramwillemse">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                        <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=20&amp;width=81px" scrolling="no" frameborder="0" style="border: none; overflow: hidden; width: 81px; height: 20px;" allowTransparency="true"></iframe>
                    </div>
    
                    <p class="postmetadata">                    
                        <?php the_tags('<strong>Onderwerpen</strong>: ', ', ', ' | '); ?> 
                        <b><?php comments_popup_link('Geen Reacties &#187;', 'E&eacute;n Reactie &#187;', '% Reacties &#187;'); ?></b>
                    </p>
                </article>

            <?php endwhile; ?>

		<div class="navigation" style="padding-top: 25px;">
			<div class="alignleft"><h3><?php next_posts_link('&laquo; Ouder') ?></h3></div>
			<div class="alignright"><h3><?php previous_posts_link('Nieuwer &raquo;') ?></h3></div>
		</div>

	<?php else : ?>

		<h3 class="center">Sorry! Ik heb niets kunnen vinden.. Probeer het nog eens, zou ik zeggen ;-) </h3>

	<?php endif; ?>

	</section>

    <aside id="column3">
        <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
    </aside> 

<?php get_footer(); ?>