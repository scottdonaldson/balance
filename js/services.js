(function($){

	function init(main, name) {
		for (var i = 0; i < BALANCE.services.length; i++) {
			if ( name === BALANCE.services[i].name || name === BALANCE.services[i].name.toLowerCase() ) {
				return initialize( main, i );
			}
		}
		return initialize( main, 0 );
	}

	$(document).ready(function() {
		var main = $('main');
		init( main, location.hash.slice(1) );
	});

	function initialize( main, index ) {

		// Deactivate
		$('html, body').animate({
			scrollTop: 0
		}, 800);

		main.fadeOut(function(){
			main.find('#content .module').remove();
			main.find('.class-preview').remove();

			displayTabs( main, index );

			var service = BALANCE.services[index];

			window.location.hash = service.name.toLowerCase();

			main.find('#masthead').css('background-image', 'url(' + service.photo + ')' )
				.find('h1').html( service.name );

			main.find('#page-intro h2').html( service.intro_title_text );
			main.find('#page-intro p').html( service.intro_paragraph_text );

			for (var i = 0; i < service.classes.length; i++) {
				var module = $('<div class="module" data-target="'+ service.classes[i].classes_name +'">'),
					heading = $('<div class="content heading bg-purple">'),
					content = $('<div class="content bg-white">');

				heading.html( '<h3>' + service.classes[i].classes_name + '</h3>' )
					.append('<div class="scroll-up"><aside /></div>')
					.prependTo( module );

				main.find('#masthead .module').append('<div class="class-preview" data-scrollto="'+ service.classes[i].classes_name +'">' + service.classes[i].classes_name + '<\/div>');

				for (var j = 0; j < service.classes[i]['class'].length; j++) {
					var thisClass = service.classes[i]['class'][j];

					content
						.append('<h4>' + thisClass.class_name  + '</h4>')
						.append('<p>' + thisClass.class_description + '<p>');
					if (thisClass.class_prerequisite) {
						content.append('<p><strong>Prerequisite:</strong> ' + thisClass.class_prerequisite + '</p>');
					}
				}
				content.appendTo( module );

				main.find('#page-intro').next().append( module );
			}

			if (main.find('#masthead .scroll-down').length === 0) {
				main.find('#masthead .module').append('<div class="scroll-down"><aside></aside><p>Scroll down for class descriptions &amp; pricing</p></div>');
				BALANCE.posScrollDown();
			} else {
				main.find('#masthead .scroll-down').appendTo('#masthead .module');
			}

			main.fadeIn();
		});
	}

	function hideTab( tab ) {
		tab.removeClass('hover');
		if ( tab.next('.tab').length > 0 ) {
			setTimeout(function(){
				hideTab( tab.next('.tab') );
			}, 160);
		}
	}

	function displayTabs( main, index ) {

		$('.tab').remove();

		var tabs = [];
		for (var i = 0; i < BALANCE.services.length; i++) {
			if ( i !== index ) {
				tabs.push( BALANCE.services[i] );
			}
		}
		
		for (var i = 0; i < tabs.length; i++) {
			var tab = $('<div class="tab brandon hover">'),
				arrow = $('<div class="arrow">');

			tab.html( tabs[i].name.toLowerCase() ).prepend( arrow );
			tab.prependTo( main.find('#services-nav') );
			tab.mouseover(function(){
				$(this).addClass('hover');
			}).mouseleave(function(){
				$(this).removeClass('hover');
			});
		}
		setTimeout(function(){
			hideTab( $('.tab').first() );
		}, 1400);
	}

	$('body').on('click', '.tab', function() {
		var text = $(this).text();
		for (var i = 0; i < BALANCE.services.length; i++) {
			if ( text === BALANCE.services[i].name.toLowerCase() ) {
				$('.tab').animate({ 
					right: -300
				}, 100, function() {
					initialize( $('main'), i );
				});
				break;
			}
		}
	});

}(jQuery));