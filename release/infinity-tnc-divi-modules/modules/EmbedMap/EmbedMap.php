<?php
/**
 * Module: Embed Map class.
 *
 * @package INFTNC\Modules\EmbedMap
 * @since ??
 */

namespace INFTNC\Modules\EmbedMap;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\EmbedMap\EmbedMapTrait;

/**
 * `EmbedMap` is consisted of functions used for Embed Map Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class EmbedMap implements DependencyInterface {
	use EmbedMapTrait\RenderCallbackTrait;

	/**
	 * Loads `EmbedMap` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'embed-map/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ EmbedMap::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
