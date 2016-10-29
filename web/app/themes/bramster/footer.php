	<footer id="footer" class="l-footer footer">
        <div class="toolbar toolbar--footer">
            <div class="logo column column-small">
                <span class="logo-name"><?php bloginfo('name'); ?></span>
                <span class="logo-description"><?php bloginfo('description'); ?></span>
            </div>
            <?php get_template_part('inc/nav-mobile'); ?>
            <?php get_template_part('inc/nav-main') ?>
        </div>

        <!--div class="footer__content">
    		<p>
    			<strong>KvK</strong> <a href="https://www.kvk.nl/orderstraat/product-kiezen/?kvknummer=021008990000&origq=bram+willemse">02100899</a> <strong>BTW</strong> NL194615819B01 <a href="http://creativecommons.org/licenses/by-nd/3.0/nl/">Creative Commons-licentie</a>
    		</p>
        </div-->
	</footer>

	<?php wp_footer(); ?>

	<?php if ( function_exists( 'yoast_analytics' ) ) {
		yoast_analytics();
	} ?>

</body>
</html>
