// Responsive utilities
// ------------------- -
var responsive = {
	settings: {
		isMobile: false,
		isTablet: false,
		isXS: false,
		isSM: false,
		isMD: false,
		isLG: false
	},
	fireEvents: function () {
		responsive.settings.isXS = responsive.xsDetect();
		responsive.settings.isSM = responsive.smDetect();
		responsive.settings.isMD = responsive.mdDetect();
		responsive.settings.isLG = responsive.lgDetect();

		if (responsive.settings.isXS) {
			console.log("Is a extra Small screen");
			if (responsive.settings.isMobile) {
				console.log("Is a mobile device");
			}
		} else if (responsive.settings.isSM) {
			console.log("Is a Small screen");
			if (responsive.settings.isTablet) {
				console.log("Is a Tablet device");
			}
		} else if (responsive.settings.isMD) {
			console.log("Is a Medium screen");
			if (responsive.settings.isTablet) {
				console.log("Is a Tablet device");
			}
		} else if (responsive.settings.isLG) {
			console.log("Is a Large screen");
			if (responsive.settings.isTablet) {
				console.log("Is a Tablet device");
			}
		}
	},
	xsDetect: function () {
		var isXS = false;

		if (jQuery(".visible-xs-block").css("display") === "block") {
			isXS = true;
			if (Modernizr.touchevents) {
				responsive.settings.isMobile = true;
			}
		}

		return isXS;
	},
	smDetect: function () {
		var isSM = false;

		if (jQuery(".visible-sm-block").css("display") === "block") {
			isSM = true;
			if (Modernizr.touchevents) {
				responsive.settings.isTablet = true;
			}
		}
		return isSM;
	},
	mdDetect: function () {
		var isMD = false;

		if (jQuery(".visible-md-block").css("display") === "block") {
			isMD = true;
			if (Modernizr.touchevents) {
				responsive.settings.isTablet = true;
			}
		}
		return isMD;
	},
	lgDetect: function () {
		var isLG = false;

		if (jQuery(".visible-lg-block").css("display") === "block") {
			isLG = true;
			if (Modernizr.touchevents) {
				responsive.settings.isTablet = true;
			}
		}
		return isLG;
	}
};

(function ($) {
	jQuery("body").append('<div class="visible-xs-block"></div><div class="visible-sm-block"></div><div class="visible-md-block"></div><div class="visible-lg-block"></div>');
	responsive.fireEvents();
})(jQuery);