<?php
/**
 * YoutubeEmbed::module_script_data()
 *
 * @package INFTNC\Modules\YoutubeEmbed
 * @since ??
 */

namespace INFTNC\Modules\YoutubeEmbed\YoutubeEmbedTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Packages\Module\Layout\ScriptData;

trait ModuleScriptDataTrait {

	/**
	 * Youtube Embed module script data callback.
	 *
	 * @since ??
	 *
	 * @param ScriptData $script_data ScriptData instance.
	 *
	 * @return void
	 */
	public static function module_script_data( $script_data ) {
		// Script data will be added here if needed.
	}
}
