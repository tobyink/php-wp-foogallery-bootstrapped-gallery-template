<?php
/**
 * FooGallery Bootstrapped Gallery Extension
 *
 * @package   Bootstrapped_Gallery_Template_FooGallery_Extension
 * @author     Toby Inkster
 * @license   GPL-2.0+
 * @link      http://toby.ink/
 * @copyright 2014  Toby Inkster
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery - Bootstrapped Gallery
 * Version:     1.0.1
 * Author:       Toby Inkster
 * Author URI:  http://toby.ink/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'Bootstrapped_Gallery_Template_FooGallery_Extension' ) ) {

	define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_FILE', __FILE__ );
	define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_URL', plugin_dir_url( __FILE__ ));
	define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_VERSION', '1.0.0');
	define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_PATH', plugin_dir_path( __FILE__ ));
	define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_SLUG', 'foogallery-bootstrapped-gallery');
	//define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_URL', 'http://fooplugins.com');
	//define('BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_ITEM_NAME', 'Bootstrapped Gallery');

	require_once( 'foogallery-bootstrapped-gallery-init.php' );

	class Bootstrapped_Gallery_Template_FooGallery_Extension {
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			add_filter( 'foogallery_located_template-bootstrapped-gallery', array( $this, 'enqueue_dependencies' ) );
			add_filter( 'foogallery_template_js_ver-bootstrapped-gallery', array( $this, 'override_version' ) );
			add_filter( 'foogallery_template_css_ver-bootstrapped-gallery', array( $this, 'override_version' ) );

			//used for auto updates and licensing in premium extensions. Delete if not applicable
			//init licensing and update checking
			//require_once( BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_PATH . 'includes/EDD_SL_FooGallery.php' );

			//new EDD_SL_FooGallery_v1_1(
			//	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_FILE,
			//	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_SLUG,
			//	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_VERSION,
			//	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_URL,
			//	BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_ITEM_NAME,
			//	'Bootstrapped Gallery');
		}

		/**
		 * Register myself so that all associated JS and CSS files can be found and automatically included
		 * @param $extensions
		 *
		 * @return array
		 */
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}

		/**
		 * Override the asset version number when enqueueing extension assets
		 */
		function override_version( $version ) {
			return BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_VERSION;
		}

		/**
		 * Enqueue any script or stylesheet file dependencies that your gallery template relies on
		 */
		function enqueue_dependencies() {
			//$js = BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/jquery.bootstrapped-gallery.js';
			//wp_enqueue_script( 'bootstrapped-gallery', $js, array('jquery'), BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );

			//$css = BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/bootstrapped-gallery.css';
			//foogallery_enqueue_style( 'bootstrapped-gallery', $css, array(), BOOTSTRAPPED_GALLERY_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );
		}

		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'bootstrapped-gallery',
				'name'        => __( 'Bootstrapped Gallery', 'foogallery-bootstrapped-gallery'),
				'fields'	  => array(
					array(
						'id'      => 'density',
						'title'   => __('Gallery Density', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Basic control of layout', 'foogallery-bootstrapped-gallery'),
						'default' => 'default',
						'type'    => 'select',
						'choices' => array(
							'default' => __( 'Default density', 'foogallery-bootstrapped-gallery' ),
							'more'    => __( 'More images per row', 'foogallery-bootstrapped-gallery' ),
							'fewer'   => __( 'Fewer images per row', 'foogallery-bootstrapped-gallery' )
						)
					),
					array(
						'id'      => 'cell-classes',
						'title'   => __('Cell classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to image cells', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					),
					array(
						'id'      => 'figure-classes',
						'title'   => __('Figure classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to HTML figure element', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					),
					array(
						'id'      => 'img-classes',
						'title'   => __('Image classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to images', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					),
					array(
						'id'      => 'heading-classes',
						'title'   => __('Heading classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to headings', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					),
					array(
						'id'      => 'subheading-classes',
						'title'   => __('Subheading classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to subheadings', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					),
					array(
						'id'      => 'description-classes',
						'title'   => __('Description classes', 'foogallery-bootstrapped-gallery'),
						'desc'    => __('Additional HTML classes to add to descriptions', 'foogallery-bootstrapped-gallery'),
						'default' => '',
						'type'    => 'text'
					)
				)
			);

			return $gallery_templates;
		}
	}
}