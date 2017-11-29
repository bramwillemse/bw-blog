	<footer id="footer" class="l-footer footer">
        <div class="toolbar toolbar--footer">
            <div class="logo logo--inline column column-small">
                <span class="logo__name"><?php bloginfo('name'); ?></span>
                <span class="logo__description"><?php bloginfo('description'); ?></span>
            </div>
            
            <div class="footer__content">
                <strong>KvK</strong> <a href="https://www.kvk.nl/orderstraat/product-kiezen/?kvknummer=021008990000&origq=bram+willemse">02100899</a> <strong>BTW</strong> NL194615819B01 <strong>License</strong> <a href="http://creativecommons.org/licenses/by-nd/3.0/nl/">Creative Commons</a>
            </div>            
        </div>
	</footer>

	<?php wp_footer(); ?>

	<?php if ( function_exists( 'yoast_analytics' ) ) {
		yoast_analytics();
	} ?>

</body>
</html>
