<?php
/**
 * Module: LogoCarouselChild class.
 *
 * @package INFTNC\Modules\LogoCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\LogoCarouselChild;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `LogoCarouselChild` handles Front-End rendering for the Logo Carousel Child module.
 *
 * @since ??
 */
class LogoCarouselChild implements DependencyInterface {
	use LogoCarouselChildTrait\RenderCallbackTrait;

	/**
	 * Loads `LogoCarouselChild` and registers Front-End render callback.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'logo-carousel-child/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ LogoCarouselChild::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
