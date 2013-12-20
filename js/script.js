(function($){

	var win = $(window),
		body = $('body');

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

	win.load(function(){
		$('.preload').removeClass('preload');
	});

})(jQuery);