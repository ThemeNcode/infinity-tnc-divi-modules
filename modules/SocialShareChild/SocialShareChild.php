<?php
/**
 * Module: SocialShareChild class.
 *
 * @package INFTNC\Modules\SocialShareChild
 * @since ??
 */

namespace INFTNC\Modules\SocialShareChild;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `SocialShareChild` is consisted of functions used for Social Share Child Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class SocialShareChild implements DependencyInterface {
	use SocialShareChildTrait\RenderCallbackTrait;

	/**
	 * Loads `SocialShareChild` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'social-share-child/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ SocialShareChild::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
