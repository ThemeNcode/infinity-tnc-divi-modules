<?php
/**
 * Module: ImageCarousel class.
 *
 * @package INFTNC\Modules\ImageCarousel
 * @since ??
 */

namespace INFTNC\Modules\ImageCarousel;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `ImageCarousel` handles Front-End rendering and REST API endpoints for the Image Carousel module.
 *
 * @since ??
 */
class ImageCarousel implements DependencyInterface {
	use ImageCarouselTrait\RenderCallbackTrait;

	/**
	 * Loads `ImageCarousel` and registers Front-End render callback.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		add_action( 'init', [ $this, 'register_module' ] );
	}

	/**
	 * Registers the module and its assets on `init`.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function register_module() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'image-carousel/';

		wp_register_script(
			'inftnc-slick',
			INFINITY_TNC_DIVI_MODULES_URL . 'admin/assets/js/inftnc-slick.min.js',
			[ 'jquery', 'slick' ],
			'1.2.0',
			true
		);

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ ImageCarousel::class, 'render_callback' ],
				'assets'          => [
					'scripts' => [
						'slick',
						'inftnc-slick',
					],
					'styles' => [
						'inftnc-image-carousel',
					],
				],
			]
		);
	}
}
