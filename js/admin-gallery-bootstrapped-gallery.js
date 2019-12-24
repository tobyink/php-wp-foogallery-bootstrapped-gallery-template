//Use this file to inject custom javascript behaviour into the foogallery edit page
//For an example usage, check out wp-content/foogallery/extensions/default-templates/js/admin-gallery-default.js

(function (BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION, $, undefined) {

	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION.doSomething = function() {
		//do something when the gallery template is changed to bootstrapped-gallery
	};

	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION.adminReady = function () {
		$('body').on('foogallery-gallery-template-changed-bootstrapped-gallery', function() {
			BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION.doSomething();
		});
	};

}(window.BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION = window.BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION || {}, jQuery));

jQuery(function () {
	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION.adminReady();
});