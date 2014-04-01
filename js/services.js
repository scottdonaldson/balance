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

				var nthChild = i === 0 ? 'first-child' : 'not-first-child';

				var module = $('<div class="module ' + nthChild + '" data-target="' + service.classes[i].classes_name + '">'),
					heading = $('<div class="content heading bg-purple">'),
					content = $('<div class="content bg-white">'),

					metaInfo = $('<div class="clearfix">'),
					metaBlock = $('<div class="meta-block">');

				var discountInfo = service.classes[i].classes_cost_info ? '<span class="big">' + service.classes[i].classes_cost_info + '</span><br>' : '';

				var discount = $('<div class="discount" style="display: none;"><p>' + discountInfo + 'Call (301.986.1730) or drop by for more information.</p></div>')

				heading.html( '<h3>' + service.classes[i].classes_name + '</h3>' )
					.append('<div class="scroll-up"><span class="icon-arrow-up white aligncenter" /></div>')
					.prependTo( module );

				var duration = service.classes[i].classes_duration.replace(/mins|minutes|min/i, '<small>Min</small>'),
					size = service.classes[i].classes_size.replace(/max/i, '<small>Max</small>'),
					cost = service.classes[i].classes_cost;

				if ( duration && size && cost ) {

					metaBlock.clone().html('<h4>' + duration + '</h4><aside>Duration</aside>').appendTo(metaInfo);

					metaBlock.clone().html('<h4>' + size + '</h4><aside>Class Size</aside>').appendTo(metaInfo);

					metaBlock.clone().html('<h4><small>$</small> ' + cost + '</h4><aside class="cost">Cost <span class="plus">+</span></aside>').appendTo(metaInfo);

					metaBlock.clone().addClass('last-meta-block').html('<a href="#">View Schedule</a>').appendTo(metaInfo);

					metaInfo.append(discount);

					metaInfo.prependTo(content);

				}

				main.find('#masthead .module').append('<div class="class-preview" data-scrollto="'+ service.classes[i].classes_name +'">' + service.classes[i].classes_name + '<\/div>');

				for (var j = 0; j < service.classes[i]['class'].length; j++) {
					var thisClass = service.classes[i]['class'][j];

					content
						.append('<h4>' + thisClass.class_name  + '</h4>')
						.append('<p>' + thisClass.class_description + '<p>');
					if ( thisClass.class_prerequisite ) {
						content.append('<p><strong>Prerequisite:</strong> ' + thisClass.class_prerequisite + '</p>');
					}
					
				}

				if ( service.classes[i].pricing_table ) {

					var table = service.classes[i].pricing_table;
					table = table.replace(/\$/g, '<small style="margin-right: 5px;">$</small>')
					table = $(table);

					//var cols = table.find('tr:first').find('td').length;

					table.find('td').css( 'width', 500);

					content.append( table );
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

			$('.cost').each(function(){

				$(this).add( $(this).prev() ).click(function() {
					var $this = $(this);
					$this.closest('.module').find('.discount').slideToggle();
					$this.closest('.module').find('.plus').html( $this.closest('.module').find('.plus').html() === '+' ? '-' : '+' );
				});

			});

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
				arrow = $('<span class="icon-arrow-right">');

			tab.html( tabs[i].name.toLowerCase() ).prepend( arrow );
			tab.prependTo( main.find('#services-nav') );
			tab.mouseover(function(){
				$(this).addClass('hover');
			}).mouseleave(function(){
				$(this).removeClass('hover');
			});
		}
		main.find('#services-nav').prepend('<span class="more-services">More Services <span class="icon-arrow-down"></span></span>');


		
			$('.tab').each(function(index){
				var _this = $(this);
				setTimeout(function(){
					_this.removeClass('hover');
				}, 1600 + 250 * index);
			});

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