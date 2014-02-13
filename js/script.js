(function($){

	var win = $(window),
		body = $('body'),
		page = $('#page'),
		main = $('main');

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
	function showSmallScreenMenu() {
		page.animate({ left: '-75%' });
		smallScreenMenu.animate({ left: '25%' });
		body.addClass('small-screen-menu-active');
	}
	function hideSmallScreenMenu() {
		page.animate({ left: 0 });
		smallScreenMenu.animate({ left: '100%' });
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

	// ----- Home page -- insert <section>s after API call to Services page

	// Given some data and a templated <section>, insert the data into the <section>
	function populateSection( data, section, i ) {
		section.css({
			backgroundImage: 'url(' + data.photo_main + ')',
			zIndex: 100 - i
		});
		section.find('h2').html( data.name );
		section.find('p').html( data.intro_title_text );
		section.find('a').attr('href', section.find('a').attr('href') + '#' + BALANCE.slugify( data.name ) );
		if ( i % 2 === 1 ) {
			section.find('.module').addClass('right');
		}
		section.insertBefore( '#updates-specials' ).show();
		if ( i === BALANCE.services.length - 1 ) {
			body.removeClass('preload');
		}
	}

	// Insert the sections -- use the existing <section> as a template,
	// and clone it for subsequent ones
	function insertSections() {
		var template = $('[data-template="services"]');
		if ( BALANCE.services ) {
			for (var i = 0; i < BALANCE.services.length; i++) {
				populateSection( BALANCE.services[i], template.clone(), i );
			}
		} else {
			setTimeout(insertSections, 10);
		}
	}

	// Go go go!
	if ( body.hasClass('home') ) {
		insertSections();
	}

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

	// ----- Modals
	var modal = $('.modal'),
		modalCover = $('.modal-cover');

	function showModal(e) {
		e.preventDefault();
		modal.css('height', win.height() * 0.5);
		modal.fadeIn().css({
			top: win.height() * 0.25
		});
		modalCover.fadeIn();
	}

	function removeModal() {
		modal.fadeOut();
		modalCover.fadeOut();
	}

	$('[data-modal]').click( showModal );
	$('.modal-close, .modal-cover').click( removeModal );
	win.keydown(function(e){
		if ( e.keyCode === 27 ) { removeModal(); }
	});

}(jQuery));