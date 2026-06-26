<?php
/**
 * Module: Youtube Embed class.
 *
 * @package INFTNC\Modules\YoutubeEmbed
 * @since ??
 */

namespace INFTNC\Modules\YoutubeEmbed;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;
use INFTNC\Modules\YoutubeEmbed\YoutubeEmbedTrait;

/**
 * `YoutubeEmbed` is consisted of functions used for Youtube Embed Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class YoutubeEmbed implements DependencyInterface {
	use YoutubeEmbedTrait\RenderCallbackTrait;

	/**
	 * Loads `YoutubeEmbed` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$module_json_folder_path = INFINITY_TNC_DIVI_MODULES_JSON_PATH . 'youtube-embed/';

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ YoutubeEmbed::class, 'render_callback' ],
					]
				);
			}
		);
	}
}
