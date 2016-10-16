<?php if ( is_page_template('page-portfolio.php') ) : ?>

	<?php if ( is_active_sidebar('widgets-portfolio') ) : ?>
		<?php dynamic_sidebar('widgets-portfolio'); ?>
	<?php endif; ?>

<?php elseif ( is_page_template('page-about.php') || is_page('hosting-en-onderhoud') ) : ?>

	<?php if ( is_active_sidebar('widgets-about') ) : ?>
		<?php dynamic_sidebar('widgets-about'); ?>
	<?php endif; ?>

<?php elseif ( is_archive() || is_home() ) : ?>
	<?php if (is_active_sidebar('widgets-archives') ) : ?>
		<?php dynamic_sidebar('widgets-archives'); ?>
	<?php endif; ?>

<?php elseif ( is_single() && get_post_type() == 'websites' )  : ?>
	<?php if (is_active_sidebar('widgets-portfolio') ) : ?>
		<?php dynamic_sidebar('widgets-portfolio'); ?>
	<?php endif; ?>

<?php elseif ( is_single() ) : ?>
	<?php if (is_active_sidebar('widgets-single') ) : ?>
		<?php dynamic_sidebar('widgets-single'); ?>
	<?php endif; ?>
<?php endif; ?>
