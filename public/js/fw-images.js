(function($) {
		function fullwidthimgswitch() {
			if( $(window).width() < 980){
				$('.et_pb_section .fullwidth:first-child .fw-text').detach().appendTo('.et_pb_section .fullwidth:first-child');
				$('.et_pb_section .fullwidth:nth-child(3) .fw-text').detach().appendTo('.et_pb_section .fullwidth:nth-child(3)');
			}
		}
		
		fullwidthimgswitch();
		
		function fullwidthheight() {
			$('.fullwidth').each( function() {
				$(this).css('height', $(this).find('.et_pb_blurb').outerHeight() );
			});
		}
		
		fullwidthheight();
		
		$(window).resize(function(){
			fullwidthheight();
			fullwidthimgswitch();
		});	
})( jQuery );