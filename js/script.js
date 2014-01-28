(function($){

	var win = $(window),
		body = $('body'),
		page = $('#page');

	// ----- Nav menu

	var menuTargets = $('[menu-target]');

	function activateMenu() {
		$('#' + this.getAttribute('menu-target')).addClass('active');
	}
	function deactivateMenu() {
		var target = $('#' + this.getAttribute('menu-target'));
		if ( !target.is(':hover') ) {
			target.removeClass('active');
		}

		if ( !target.hasClass('listening') ) {
			target.mouseleave(function(){
				target.removeClass('active');
			});
			target.addClass('listening');
		}
	}
	menuTargets.mouseenter( activateMenu ).mouseleave( deactivateMenu );

	// ----- Small screen menu

	var smallScreenMenu = $('#small-screen-menu');
	$('#small-screen-menu-icon').click(function(){
		if ( !body.hasClass('small-screen-menu-active') ) {
			page.animate({
				left: '-75%'
			});
			smallScreenMenu.animate({
				left: '25%'
			});
		} else {
			page.animate({
				left: 0
			});
			smallScreenMenu.animate({
				left: '100%'
			});
		}
		body.toggleClass('small-screen-menu-active');
	});

	// ----- Pages: make the masthead the height of the screen

	var masthead = $('#masthead');
	function setMastheadHeight() {
		masthead.css('height', !body.hasClass('admin-bar') ? win.height() : win.height() - 28);
	}
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

	BALANCE.posScrollDown = function() {
		var p = $('.scroll-down p');
		p.css('top', p.height() < 44 ? 0.5 * ( 44 - p.height() ) : 0 );
	}
	win.on('load resize', BALANCE.posScrollDown);

	// ----- "Scroll down": click on it to scroll to #content
	body.on('click', '.scroll-down', function() {
		$('html, body').animate({
			scrollTop: $('#content').position().top
		}, 800);
	});

	// ----- Scroll back up to the top of the page
	body.on('click', '.scroll-up', function(){
		$('html, body').animate({
			scrollTop: 0
		}, 800);
		$(this).parent().css({
			'padding-right': '3.5em' // prevent text in the heading from bumping into the scroll up arrow
		});
	});

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

	// ----- Studio

	var features = $('.page-template-pagesstudio-php .feature');
	features.find('.heading, img').click(function(){
		$(this).parent().find('.description').slideToggle();
	});

	// ----- Remove the preload class

	win.load(function(){
		$('.preload').removeClass('preload');
	});

}(jQuery));