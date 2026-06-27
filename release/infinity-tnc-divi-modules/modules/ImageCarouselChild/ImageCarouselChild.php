<?php
/**
 * Module: ImageCarouselChild class.
 *
 * @package INFTNC\Modules\ImageCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\ImageCarouselChild;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `ImageCarouselChild` handles Front-End rendering for the Image Carousel Child module.
 *
 * @since ??
 */
class ImageCarouselChild implements DependencyInterface {
	use ImageCarouselChildTrait\RenderCallbackTrait;

	/**
	 * Loads `ImageCarouselChild` and registers Front-End render callback.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'image-carousel-child/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ ImageCarouselChild::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
