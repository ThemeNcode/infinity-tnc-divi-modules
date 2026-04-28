<?php
/**
 * Module: Heading Gradient class.
 *
 * @package INFTNC\Modules\HeadingGradient
 * @since ??
 */

namespace INFTNC\Modules\HeadingGradient;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\HeadingGradient\HeadingGradientTrait;

/**
 * `HeadingGradient` is consisted of functions used for Heading Gradient Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class HeadingGradient implements DependencyInterface {
	use HeadingGradientTrait\RenderCallbackTrait;

	/**
	 * Loads `HeadingGradient` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'heading-gradient/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ HeadingGradient::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
