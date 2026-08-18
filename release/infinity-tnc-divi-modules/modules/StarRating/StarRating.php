<?php
/**
 * Module: StarRating class.
 *
 * @package INFTNC\Modules\StarRating
 * @since ??
 */

namespace INFTNC\Modules\StarRating;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\StarRating\StarRatingTrait;

/**
 * `StarRating` is consisted of functions used for Star Rating Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class StarRating implements DependencyInterface {
	use StarRatingTrait\RenderCallbackTrait;

	/**
	 * Loads `StarRating` and registers Front-End render callback and REST API Endpoints.
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
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'star-rating/';

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ StarRating::class, 'render_callback' ],
			]
		);
	}
}
