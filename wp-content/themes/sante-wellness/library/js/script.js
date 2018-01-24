var SBchild = {
	init : function($) {
		"use strict";

        var $cache = {
            body: 		$('body'),
            navigation: $("#site-navigation"),
            header:		$("#site-header"),
            content: 	$('#site-content'),
            footer: 	$('#site-footer')
        };


		// Window scroll - navbar animation
		// ------------------------------------------------------------------
		$(window).scroll(function() {
			var scrollposition = $(window).scrollTop();

			if(scrollposition > 400) {
				$cache.body.addClass('has-reduced-menu');
			} else {
				$cache.body.removeClass('has-reduced-menu');
			}
		});

		$cache.body.on('click', 'a[href*=#].has-scroll-animation:not([href=#])', function(event) {
			if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
				var target =  $(this.hash);

				console.log(target.selector);
				console.log('The Pathname: '+location.pathname, ', This pathname: '+this.pathname, ', The Hostname : '+location.hostname);

				if( target.selector.length) {
					event.preventDefault();
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 500);

					$cache.body.toggleClass('has-navigation-active');
				}
			}

		});


        // Slideshows
        // ------------------------------------------------------------------
        $('.js-slideshow').slick({
            "infinite": true,
            "draggable": true,
            "slidesToShow": 1,
            "autoplay": true,
            "nextArrow": '<button type="button" class="slick-arrow slick-next"><i class="icon-chevron-right"></i></button>',
            "prevArrow": '<button type="button" class="slick-arrow slick-prev"><i class="icon-chevron-left"></i></button>'
        });


	}
};

(function($) {
	"use strict";
	SBchild.init($);
})(jQuery);
