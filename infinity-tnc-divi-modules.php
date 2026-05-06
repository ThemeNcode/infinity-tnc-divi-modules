<?php
/*
Plugin Name: Infinity TNC Divi Modules
Plugin URI:  https://divi.themencode.com/infinity-tnc-divi-modules-preview/
Description: Fulfill your Divi experience with the awesome & useful modules for every purpose you need.
Version:     1.2.0
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
 * Requires Autoloader.
 */
require INFINITY_TNC_DIVI_MODULES_PATH . 'vendor/autoload.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'modules/Modules.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'admin/breadcrumbs.php';
require INFINITY_TNC_DIVI_MODULES_PATH . 'admin/inftnc-divi-modules-public.php';

/**
 * Register all Divi 4 modules.
 *
 * @since ??
 */
function infinity_tnc_divi_module_initialize_d4_modules() {
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/Divi4Module/Divi4Module.php';
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/Divi4OnlyModule/Divi4OnlyModule.php';
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
	require_once INFINITY_TNC_DIVI_MODULES_PATH . 'divi-4/modules/ImageCarouselChild/ImageCarouselChild.php'
	
}
add_action( 'et_builder_ready', 'infinity_tnc_divi_module_initialize_d4_modules' );

/**
 * Enqueue Divi 4 Visual Builder Assets
 *
 * @since ??
 */
function infinity_tnc_divi_module_enqueue_d4_vb_scripts() {
	if ( et_core_is_fb_enabled() ) {
		$plugin_dir_url = plugin_dir_url( __FILE__ );
		wp_enqueue_script(
			'infinity-tnc-divi-modules-d4-vb',
			"{$plugin_dir_url}divi-4/build/infinity-tnc-divi-modules-divi4.js",
			array( 'react', 'jquery' ),
			'1.2.0',
			true
		);
		wp_enqueue_style( 'inftnc-embed-map-vb-style', "{$plugin_dir_url}divi-4/modules/EmbedMap/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-star-rating-vb-style', "{$plugin_dir_url}divi-4/modules/StarRating/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-youtube-embed-vb-style', "{$plugin_dir_url}divi-4/modules/YoutubeEmbed/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-vimeo-video-vb-style', "{$plugin_dir_url}divi-4/modules/VimeoVideo/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-heading-gradient-vb-style', "{$plugin_dir_url}divi-4/modules/HeadingGradient/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-breadcrumb-vb-style', "{$plugin_dir_url}divi-4/modules/BreadCrumbs/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-social-share-vb-style', "{$plugin_dir_url}divi-4/modules/SocialShare/style.css", array(), '1.2.0' );
		wp_enqueue_style( 'inftnc-social-share-child-vb-style', "{$plugin_dir_url}divi-4/modules/SocialShareChild/style.css", array(), '1.2.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'infinity_tnc_divi_module_enqueue_d4_vb_scripts' );

/**
 * Enqueue style and scripts of Module Extension Example for Visual Builder.
 *
 * @since ??
 */
function infinity_tnc_divi_module_enqueue_vb_scripts() {
	if ( et_builder_d5_enabled() && et_core_is_fb_enabled() ) {
		$plugin_dir_url = plugin_dir_url( __FILE__ );

		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name'   => 'infinity-tnc-divi-modules-vb-bundle-script',
				'version' => '1.2.0',
				'script' => [
					'src' => "{$plugin_dir_url}scripts/bundle.js",
					'deps'               => [
						'divi-module-library',
						'divi-vendor-wp-hooks',
					],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);

		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name'   => 'infinity-tnc-divi-modules-vb-bundle-style',
				'version' => '1.2.0',
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
	wp_enqueue_style( 'infinity-tnc-divi-modules-bundle-style', "{$plugin_dir_url}styles/bundle.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-embed-map-style', "{$plugin_dir_url}divi-4/modules/EmbedMap/style.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-star-rating-style', "{$plugin_dir_url}divi-4/modules/StarRating/style.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-youtube-embed-style', "{$plugin_dir_url}divi-4/modules/YoutubeEmbed/style.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-vimeo-video-style', "{$plugin_dir_url}divi-4/modules/VimeoVideo/style.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-social-share-style', "{$plugin_dir_url}divi-4/modules/SocialShare/style.css", array(), '1.2.0' );
	wp_enqueue_style( 'inftnc-social-share-child-style', "{$plugin_dir_url}divi-4/modules/SocialShareChild/style.css", array(), '1.2.0' );
}
add_action( 'wp_enqueue_scripts', 'infinity_tnc_divi_module_enqueue_frontend_scripts' );
