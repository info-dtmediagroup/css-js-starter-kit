/* Fullscreen Slider */

jQuery(function(){
	var $header = jQuery('#main-header'),
		$topheader = jQuery('#top-header'),
		$wpadminbar = jQuery('#wpadminbar'),
		$slider = jQuery('.fullscreenslider');
		
		$slider.height( jQuery(window).height() - $header.height() - $topheader.height() - $wpadminbar.height());
		
		jQuery('.fullscreenslider .et_pb_slides').height('100%');
		jQuery('.fullscreenslider .et_pb_slide').height('100%');
		
	//Fix Window Resize
	
	jQuery( window ).resize( function (){
		var $header = jQuery('#main-header'),
		$topheader = jQuery('#top-header'),
		$wpadminbar = jQuery('#wpadminbar'),
		$slider = jQuery('.fullscreenslider');
		
		$slider.height( jQuery(window).height() - $header.height() - $topheader.height() - $wpadminbar.height());
	});
});