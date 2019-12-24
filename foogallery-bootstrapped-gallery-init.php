<?php
//This init class is used to add the extension to the extensions list while you are developing them.
//When the extension is added to the supported list of extensions, this file is no longer needed.

if ( !class_exists( 'Bootstrapped_Gallery_Template_FooGallery_Extension_Init' ) ) {
	class Bootstrapped_Gallery_Template_FooGallery_Extension_Init {

		function __construct() {
			add_filter( 'foogallery_available_extensions', array( $this, 'add_to_extensions_list' ) );
		}

		function add_to_extensions_list( $extensions ) {
			$extensions[] = array(
				'slug'=> 'bootstrapped-gallery',
				'class'=> 'Bootstrapped_Gallery_Template_FooGallery_Extension',
				'title'=> __('Bootstrapped Gallery', 'foogallery-bootstrapped-gallery'),
				'file'=> 'foogallery-bootstrapped-gallery-extension.php',
				'description'=> __('Simple gallery layout', 'foogallery-bootstrapped-gallery'),
				'author'=> ' Toby Inkster',
				'author_url'=> 'http://toby.ink/',
				'thumbnail'=> BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_URL . '/assets/extension_bg.png',
				'tags'=> array( __('template', 'foogallery') ),	//use foogallery translations
				'categories'=> array( __('Build Your Own', 'foogallery') ), //use foogallery translations
				'source'=> 'generated'
			);

			return $extensions;
		}
	}

	new Bootstrapped_Gallery_Template_FooGallery_Extension_Init();
}