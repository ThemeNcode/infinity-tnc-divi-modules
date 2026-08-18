<?php
/**
 * Module: SocialShare class.
 *
 * @package INFTNC\Modules\SocialShare
 * @since ??
 */

namespace INFTNC\Modules\SocialShare;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * `SocialShare` is consisted of functions used for Social Share Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class SocialShare implements DependencyInterface {
	use SocialShareTrait\RenderCallbackTrait;

	/**
	 * Loads `SocialShare` and registers Front-End render callback and REST API Endpoints.
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
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'social-share/';

		wp_register_script(
			'inftnc-social-share',
			INFINITY_TNC_DIVI_MODULES_URL . 'admin/assets/js/inftnc-social-share.min.js',
			[ 'jquery' ],
			'1.2.0',
			true
		);

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ SocialShare::class, 'render_callback' ],
				'assets'          => [
					'scripts' => [
						'inftnc-social-share',
					],
				],
			]
		);
	}
}
