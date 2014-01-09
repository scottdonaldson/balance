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

	// ----- Pages: make the masthead the height of the screen

	var masthead = $('#masthead');
	function setMastheadHeight() {
		masthead.css('height', !body.hasClass('admin-bar') ? win.height() : win.height() - 28);
	};
	setMastheadHeight();
	win.on('load resize', setMastheadHeight);

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

	// ----- "Scroll down" paragraph (if only on one line)

	var p = $('.scroll-down p');
	function posScrollDownP() {
		if ( p.height() < 44 ) {
			p.css('top', 0.5 * ( 44 - p.height() ) )
		} else {
			p.css('top', 0);
		}
	}
	win.on('load resize', posScrollDownP);

	// ----- Instructors
	
	var instructors = $('.instructor');
	instructors.click(function(){
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active').siblings().removeClass('active');
			$this.parent().next().slideUp().html( $this.attr('data-bio') ).delay(100).slideDown();
		} else {
			$this.removeClass('active');
			$this.parent().next().slideUp();
		}
		
	});

	// ----- Remove the preload class

	win.load(function(){
		$('.preload').removeClass('preload');
	});

})(jQuery);