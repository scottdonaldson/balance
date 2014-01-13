(function($){ $(document).ready(function(){
	
	var hideContentEditor = ['Instructors', 'Services', 'Studio'];

	if ( hideContentEditor.indexOf( $('#page_template').find(':selected').text() ) > -1 ) {
		$('#postdivrich').hide();
	}

}); }(jQuery));