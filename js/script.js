(function($){

	var win = $(window),
		body = $('body'),
		page = $('#page'),
		main = $('main');

	// ----- Nav menu

	var menuTargets = $('[menu-target]');

	function activateMenu() {
		$('#' + $(this).attr('menu-target')).addClass('active');
	}
	function deactivateMenu() {
		var target = $('#' + $(this).attr('menu-target'));

		target.removeClass('active');

		target.mouseenter(function(){
			$(this).addClass('active');
		}).mouseleave(function(){
			$(this).removeClass('active');
		});
	}
	menuTargets.mouseenter( activateMenu ).mouseleave( deactivateMenu );

	// ----- Small screen menu

	var smallScreenMenu = $('#small-screen-menu');
	function showSmallScreenMenu() {
		smallScreenMenu.animate({ left: '25%' }, 300);
		body.addClass('small-screen-menu-active');
	}
	function hideSmallScreenMenu() {
		smallScreenMenu.animate({ left: '100%' }, 300);
		body.removeClass('small-screen-menu-active');
	}
	$('#small-screen-menu-icon').click( showSmallScreenMenu );
	body.on('click', '.exit-small-screen-menu', hideSmallScreenMenu);

	// ----- Pages: make the masthead the height of the screen

	var masthead = $('#masthead');
	function setMastheadHeight() {
		masthead.css('height', !body.hasClass('admin-bar') ? win.height() : win.height() - 28);
	}
	setMastheadHeight();
	win.on('load resize', setMastheadHeight);

	// ----- Home page scrolling

	function lightUpSection() {
		$('.home main > section').each(function(){
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
	BALANCE.posScrollDown = function() {
		p.css('top', p.height() < 44 ? 0.5 * ( 44 - p.height() ) : 0 );
	};
	win.on('load resize', BALANCE.posScrollDown);
	// If we're on a page with this .scroll-down, we must remove preload
	if ( p.length > 0 ) {
		win.load(function(){
			body.removeClass('preload');
		});
	}

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

	// ----- Click on anything with a data-scrollto attribute to scroll to the matching data-target
	body.on('click', '[data-scrollto]', function(){
		$('html, body').animate({
			scrollTop: $('[data-target="' + this.getAttribute('data-scrollto') + '"]').offset().top
		}, 800);
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
		$this.closest('.instructors').siblings('.instructors').find('.clearfix.content.bg-white').slideUp();
	});

	// ----- Studio

	var features = $('.page-template-pagesstudio-php .feature');
	features.find('.heading, img').click(function(){
		$(this).parent().find('.description').slideToggle();
	});

	// ----- Modal

	function showModal(e) {
		e.preventDefault();
		var modal = $('.modal-container[data-name="' + $(this).attr('data-modal') + '"]');
		body.addClass('modal-active');
		modal.animate({ opacity: 1 });
	}
	function hideModal() {
		$('.modal-container').animate({ opacity: 0 });
		setTimeout(function(){ body.removeClass('modal-active') }, 300);
	}
	$('[data-modal]').click( showModal );

	$('.modal-container').click(function(e){
		if ( $(e.target).parents('.modal-content').length !== 1 ) {
			hideModal();
		}
	});
	$('.modal-close').click(hideModal);

	win.keyup(function(e){
		if ( e.keyCode === 27 && body.hasClass('modal-active')) {
			hideModal();
		}
	});

}(jQuery));