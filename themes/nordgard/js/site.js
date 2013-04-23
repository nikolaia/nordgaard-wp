(function( $ ) {
	var lock=false, value, width = $("#codeForm").outerWidth();
	
	$.fn.invitationCode = function() {
		
		$("#codeFormToggle").click(function () {
			
			if (lock == false) {
				
				lock = true;
				value = '-='+width;
				if ($("#codeForm").css("left") == '-'+width+'px') {
					value = '+='+width;
				}

				$('#codeForm').animate({
				    left: value
				  }, 500, function() {
				  	lock=false;
				  });
				
			}
			
		});
		
	};
	
	$("#codeForm").invitationCode();

	$('#carousel').jcarousel({
	    scroll: 1,
	    visible: 4,
	    animation: 3000,
	    auto: 3,
	    height: 175,
	    wrap: 'circular',
	    itemFallbackDimension: 300
	});

	$('#carousel a').fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	function fixMenu() {
		var sum = 0;
		$('#menuList li').each( function(){ sum += $(this).outerWidth()+15; });
		$('#menuList').width(sum);
	}

	fixMenu();

})( jQuery );