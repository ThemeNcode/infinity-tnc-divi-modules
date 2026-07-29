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
	use HeadingGradientTrait\ModuleStylesTrait;
	use HeadingGradientTrait\ModuleScriptDataTrait;

	/**
	 * Loads `HeadingGradient` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		add_action( 'init', [ $this, 'register_module' ] );
	}

	/**
	 * Registers the module on `init`.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function register_module() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'heading-gradient/';

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ HeadingGradient::class, 'render_callback' ],
			]
		);
	}
}
