<?php
/**
 * Module: Vimeo Video class.
 *
 * @package INFTNC\Modules\VimeoVideo
 * @since ??
 */

namespace INFTNC\Modules\VimeoVideo;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\VimeoVideo\VimeoVideoTrait;

/**
 * `VimeoVideo` is consisted of functions used for Vimeo Video Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class VimeoVideo implements DependencyInterface {
	use VimeoVideoTrait\RenderCallbackTrait;

	/**
	 * Loads `VimeoVideo` and registers Front-End render callback and REST API Endpoints.
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
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'vimeo-video/';

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ VimeoVideo::class, 'render_callback' ],
			]
		);
	}
}
