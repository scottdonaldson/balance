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

		window.addEventListener('hashchange', function(){
			init( main, location.hash.slice(1) );
		});
	});

	function initialize(main, index) {
		// Deactivate
		$('html, body').animate({
			scrollTop: 0
		}, 800);
		main.fadeOut(function(){
			main.find('#content .module').remove();

			var service = BALANCE.services[index];

			main.find('#masthead').css('background-image', 'url(' + service.photo + ')' )
				.find('h1').html( service.name );

			main.find('#page-intro h2').html( service.intro_title_text );
			main.find('#page-intro p').html( service.intro_paragraph_text );

			for (var i = 0; i < service.classes.length; i++) {
				var module = $('<div class="module">'),
					heading = $('<div class="content heading bg-purple">'),
					content = $('<div class="content bg-white">');

				heading.html( '<h3>' + service.classes[i].classes_name + '</h3>' )
					.append('<div class="scroll-up"><aside /></div>')
					.prependTo( module );

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

			main.fadeIn();
		});
	}

	

}(jQuery));