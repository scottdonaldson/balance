(function($){

	var win = $(window),
		body = $('body');

	// ----- Nav menu

	var menuTargets = $('[menu-target]');

	function activateMenu() {
		$('#' + this.getAttribute('menu-target')).addClass('active');
	}
	function deactivateMenu() {
		var target = $('#' + this.getAttribute('menu-target'));
		target.is(':hover') ?
			'' :
			target.removeClass('active');

		if ( !target.hasClass('listening') ) {
			target.mouseleave(function(){
				target.removeClass('active');
			});
			target.addClass('listening');
		}
	}
	menuTargets.mouseenter( activateMenu ).mouseleave( deactivateMenu );

	// ----- Home page scrolling

	var homeSections = $('.home main > section');
	function lightUpSection() {
		homeSections.each(function(){
			var $this = $(this);
			if ( win.scrollTop() - $this.offset().top > -150 && win.scrollTop() - $this.offset().top <= $this.outerHeight() - 100 ) {
				$this.addClass('active');
			} else {
				$this.removeClass('active');
			}
		});
	}
	if (body.hasClass('home')) {
		win.on('load scroll', lightUpSection);
	}

	// ----- Home page updates and specials
	$('#updates-specials .header').click(function(){
		$(this).toggleClass('active').next().slideToggle();
	});

	// ----- Remove the preload class

	win.load(function(){
		$('.preload').removeClass('preload');
	});

})(jQuery);