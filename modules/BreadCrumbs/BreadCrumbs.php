<?php
/**
 * Module: BreadCrumbs class.
 *
 * @package INFTNC\Modules\BreadCrumbs
 * @since ??
 */

namespace INFTNC\Modules\BreadCrumbs;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\BreadCrumbs\BreadCrumbsTrait;

/**
 * `BreadCrumbs` is consisted of functions used for Breadcrumbs Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class BreadCrumbs implements DependencyInterface {
	use BreadCrumbsTrait\RenderCallbackTrait;

	/**
	 * Loads `BreadCrumbs` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'bread-crumbs/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ BreadCrumbs::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
