<?php
/**
 * Module: TypeWriter class.
 *
 * @package INFTNC\Modules\TypeWriter
 * @since ??
 */

namespace INFTNC\Modules\TypeWriter;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\TypeWriter\TypeWriterTrait;

/**
 * `TypeWriter` is consisted of functions used for TypeWriter Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class TypeWriter implements DependencyInterface {
	use TypeWriterTrait\RenderCallbackTrait;

	/**
	 * Loads `TypeWriter` and registers Front-End render callback and REST API Endpoints.
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
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'type-writer/';

		ModuleRegistration::register_module(
			$module_json_folder_path,
			[
				'render_callback' => [ TypeWriter::class, 'render_callback' ],
			]
		);
	}
}
