(function ($, Drupal, window, document, undefined) {



})(jQuery, Drupal, this, this.document);

(function($) {
Drupal.behaviors.myBehavior = {
  attach: function (context, settings) {
  
  	$('.active').addClass('uk-active');  
	$('form').addClass('uk-form');
    $('#edit-actions input').addClass('uk-button uk-margin-right');
    $('#edit-actions input#edit-submit').addClass('uk-button-primary');
	$('#page-title, .block-title').each(function() {
	    var word = $(this).html();
	    var index = word.indexOf(' ');
	    if(index == -1) {
	        index = word.length;
	    }
	    $(this).html('<span class="first-word">' + word.substring(0, index) + '</span>' + word.substring(index, word.length));
	});

	
}};
})(jQuery);