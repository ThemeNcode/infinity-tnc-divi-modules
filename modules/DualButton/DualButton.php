<?php
/**
 * Module: DualButton class.
 *
 * @package INFTNC\Modules\DualButton
 * @since ??
 */

namespace INFTNC\Modules\DualButton;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\DualButton\DualButtonTrait;

/**
 * DualButton module — two side-by-side buttons with independent D5 button styles.
 *
 * @since ??
 */
class DualButton implements DependencyInterface {

	use DualButtonTrait\RenderCallbackTrait;

	/**
	 * Loads DualButton and registers Front-End render callback.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load(): void {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'dual-button/';

		add_action(
			'init',
			function () use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ DualButton::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
