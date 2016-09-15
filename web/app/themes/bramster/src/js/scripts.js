// remap jQuery to $
(function($) {

	// nav-mobile / button-toggle
	$('#button-toggle').click(function() {
		$('#nav-main').toggleClass('is-visible');
	});

})(window.jQuery);