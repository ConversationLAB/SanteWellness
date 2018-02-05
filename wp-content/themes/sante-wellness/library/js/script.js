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

		
		// Mobile slect drop down links
		// ------------------------------------------------------------------
		$cache.body.on('change', '.js-page-select', function() {
			var $el = $(this),
				value = $el.val();
			
			window.location = value;

		});

        // Slideshows
        // ------------------------------------------------------------------
        $('.js-slideshow').slick({
            "infinite": true,
            "draggable": true,
            "slidesToShow": 1,
            "autoplay": true,
            "nextArrow": '<button type="button" class="slick-arrow slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
            "prevArrow": '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>'
        });

		

		// Navigation menu
		// ------------------------------------------------------------------
		// Show the off canvas menu
		$cache.header.on('click', '.js-toggle-offcanvas-menu', function () {
			$cache.body.toggleClass('has-navigation-active');
		});

		$(".page-wrapper-overlay").on('click', function () {
			$cache.body.toggleClass('has-navigation-active');
		});


		// Mobile Flyout menu
		// -----------------------------------------------------------
		var cascadeLevel = 1;
		$('#site-navigation').on('click', '.menu-item-has-children > .menu-main-link', function () {
			var $el = $(this),
				$parent = $el.parent("li");

			// Force next navigation level to be shown
			$parent.addClass('is-expanded').siblings().removeClass('is-expanded');

			cascadeLevel++;
			$cache.navigation.addClass('cascade-level-' + cascadeLevel);

			if (responsive.settings.isSM || responsive.settings.isXS) {
				return false;
			}

		});

		$('#site-navigation').on('click', '.js-menu-back-button ', function () {
			$cache.navigation.removeClass('cascade-level-' + cascadeLevel);
			cascadeLevel--;
			$cache.navigation.addClass('cascade-level-' + cascadeLevel);

			return false;
		});


	}
};

(function($) {
	"use strict";
	SBchild.init($);
	$(window).resize(responsive.fireEvents);
})(jQuery);
