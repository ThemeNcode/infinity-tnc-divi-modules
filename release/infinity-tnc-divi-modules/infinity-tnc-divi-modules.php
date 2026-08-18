<?php
/*
Plugin Name: Infinity TNC Divi Modules
Plugin URI:  https://divi.themencode.com/infinity-tnc-divi-modules-preview/
Description: Fulfill your Divi experience with the awesome & useful modules for every purpose you need.
Version:     5.0.4
Author:      ThemeNcode LLC
Author URI:  https://themencode.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: infinity-tnc-divi-modules
Domain Path: /languages

Infinity TNC Divi Modules is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Infinity TNC Divi Modules is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Infinity TNC Divi Modules. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

define( 'INFINITY_TNC_DIVI_MODULES_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFINITY_TNC_DIVI_MODULES_URL', plugin_dir_url( __FILE__ ) );
define( 'INFINITY_TNC_DIVI_MODULES_JSON_PATH', INFINITY_TNC_DIVI_MODULES_PATH . 'modules-json/' );

/**
 * Plugin version, read once from the plugin header so it stays the single source
 * of truth. Used to version all enqueued CSS/JS assets (cache busting).
 */
define( 'INFINITY_TNC_DIVI_MODULES_VERSION', get_file_data( __FILE__, array( 'Version' => 'Version' ) )['Version'] );

/**
 * Requires Autoloader.
 */
require INFINITY_TNC_DIVI_MODULES_PATH . 'vendor/autoload.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'modules/Modules.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'admin/breadcrumbs.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'admin/inftnc-divi-modules-public.php';

/**
 * Load the plugin text domain for translations.
 *
 * The translation files (.mo) are expected in the /languages directory
 * declared by the "Domain Path" plugin header.
 *
 * @since ??
 */
function infinity_tnc_divi_module_load_textdomain() {
	load_plugin_textdomain(
		'infinity-tnc-divi-modules',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}
add_action( 'init', 'infinity_tnc_divi_module_load_textdomain' );

/**
 * Register all Divi 4 modules.
 *
 * @since ??
 */
function infinity_tnc_divi_module_initialize_d4_modules() {
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/EmbedMap/EmbedMap.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/TypeWriter/TypeWriter.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/StarRating/StarRating.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/YoutubeEmbed/YoutubeEmbed.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/VimeoVideo/VimeoVideo.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/HeadingGradient/HeadingGradient.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/BreadCrumbs/BreadCrumbs.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/DualButtons/DualButtons.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/SocialShare/SocialShare.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/SocialShareChild/SocialShareChild.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/ImageCarousel/ImageCarousel.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/ImageCarouselChild/ImageCarouselChild.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/LogoCarousel/LogoCarousel.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/LogoCarouselChild/LogoCarouselChild.php';
}
add_action( 'et_builder_ready', 'infinity_tnc_divi_module_initialize_d4_modules' );

/**
 * Enqueue Divi 4 Visual Builder Assets
 *
 * @since ??
 */
function infinity_tnc_divi_module_enqueue_d4_vb_scripts() {
	if ( function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) {
		$plugin_dir_url = plugin_dir_url( __FILE__ );
		wp_enqueue_script(
			'infinity-tnc-divi-modules-d4-vb',
			"{$plugin_dir_url}divi-4/build/infinity-tnc-divi-modules-divi4.js",
			array( 'react', 'jquery', 'underscore' ),
			INFINITY_TNC_DIVI_MODULES_VERSION,
			true
		);
		wp_enqueue_style( 'inftnc-d4-vb-style', "{$plugin_dir_url}divi-4/vb-style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-embed-map-vb-style', "{$plugin_dir_url}divi-4/modules/EmbedMap/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-star-rating-vb-style', "{$plugin_dir_url}divi-4/modules/StarRating/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-youtube-embed-vb-style', "{$plugin_dir_url}divi-4/modules/YoutubeEmbed/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-vimeo-video-vb-style', "{$plugin_dir_url}divi-4/modules/VimeoVideo/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-heading-gradient-vb-style', "{$plugin_dir_url}divi-4/modules/HeadingGradient/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-breadcrumb-vb-style', "{$plugin_dir_url}divi-4/modules/BreadCrumbs/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-dual-buttons-vb-style', "{$plugin_dir_url}divi-4/modules/DualButtons/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-social-share-vb-style', "{$plugin_dir_url}divi-4/modules/SocialShare/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
		wp_enqueue_style( 'inftnc-social-share-child-vb-style', "{$plugin_dir_url}divi-4/modules/SocialShareChild/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );

		/*
		 * Image/Logo carousel slick styles (navigation arrows + pagination dots) for the
		 * classic (Divi 4) Visual Builder. The Divi 5 carousel modules reuse the same
		 * .slick-inftnc-arrow / .inftnc_carousels_image_wrapper classes, and these rules use
		 * !important, so only load them for the Divi 4 builder to avoid overriding Divi 5.
		 */
		if ( ! function_exists( 'et_builder_d5_enabled' ) || ! et_builder_d5_enabled() ) {
			wp_enqueue_style( 'inftnc-image-carousel' );
			wp_enqueue_style( 'inftnc-logo-carousel' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'infinity_tnc_divi_module_enqueue_d4_vb_scripts' );

/**
 * Enqueue style and scripts of Module Extension Example for Visual Builder.
 *
 * @since ??
 */
function infinity_tnc_divi_module_enqueue_vb_scripts() {
	if ( function_exists( 'et_builder_d5_enabled' ) && et_builder_d5_enabled()
		&& function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) {
		$plugin_dir_url = plugin_dir_url( __FILE__ );

		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name'   => 'infinity-tnc-divi-modules-vb-bundle-script',
				'version' => INFINITY_TNC_DIVI_MODULES_VERSION,
				'script' => [
					'src' => "{$plugin_dir_url}scripts/bundle.js",
					'deps'               => [
						'divi-module-library',
						'divi-vendor-wp-hooks',
						'divi-conversion',
					],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);

		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name'   => 'infinity-tnc-divi-modules-vb-bundle-style',
				'version' => INFINITY_TNC_DIVI_MODULES_VERSION,
				'style' => [
					'src' => "{$plugin_dir_url}styles/vb-bundle.css",
					'deps'               => [],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);
	}
}
add_action( 'divi_visual_builder_assets_before_enqueue_scripts', 'infinity_tnc_divi_module_enqueue_vb_scripts' );

/**
 * Enqueue style and scripts of Module Extension Example
 *
 * @since ??
 */
function infinity_tnc_divi_module_enqueue_frontend_scripts() {
	$plugin_dir_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'infinity-tnc-divi-modules-bundle-style', "{$plugin_dir_url}styles/bundle.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-embed-map-style', "{$plugin_dir_url}divi-4/modules/EmbedMap/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-star-rating-style', "{$plugin_dir_url}divi-4/modules/StarRating/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-youtube-embed-style', "{$plugin_dir_url}divi-4/modules/YoutubeEmbed/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-vimeo-video-style', "{$plugin_dir_url}divi-4/modules/VimeoVideo/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-heading-gradient-style', "{$plugin_dir_url}divi-4/modules/HeadingGradient/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-breadcrumb-style', "{$plugin_dir_url}divi-4/modules/BreadCrumbs/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-dual-buttons-style', "{$plugin_dir_url}divi-4/modules/DualButtons/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-social-share-style', "{$plugin_dir_url}divi-4/modules/SocialShare/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
	wp_enqueue_style( 'inftnc-social-share-child-style', "{$plugin_dir_url}divi-4/modules/SocialShareChild/style.css", array(), INFINITY_TNC_DIVI_MODULES_VERSION );
}
add_action( 'wp_enqueue_scripts', 'infinity_tnc_divi_module_enqueue_frontend_scripts' );