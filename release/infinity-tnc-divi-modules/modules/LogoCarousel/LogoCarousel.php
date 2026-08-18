<?php
/**
 * Module: LogoCarousel class.
 *
 * @package INFTNC\Modules\LogoCarousel
 * @since ??
 */

namespace INFTNC\Modules\LogoCarousel;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `LogoCarousel` handles Front-End rendering and REST API endpoints for the Logo Carousel module.
 *
 * @since ??
 */
class LogoCarousel implements DependencyInterface {
	use LogoCarouselTrait\RenderCallbackTrait;

	/**
	 * Loads `LogoCarousel` and registers Front-End render callback.
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
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'logo-carousel/';

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ LogoCarousel::class, 'render_callback' ],
				'assets'          => [
					'scripts' => [
						'slick',
						'inftnc-slick',
					],
					'styles' => [
						'inftnc-logo-carousel',
					],
				],
			]
		);
	}
}
