/* Fullscreen Slider */

jQuery(function(){
	var header = jQuery('#main-header'),
		top-header = jQuery('#top-header'),
		wpadminbar = jQuery('#wpadminbar'),
		slider = jQuery('.fulscreenslider');
		
		slider.height( jQuery(window).height() - header.height() - top-header.height() - wpadminbar.height());
});