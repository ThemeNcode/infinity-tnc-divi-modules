<?php
/**
 * YoutubeEmbed::custom_css().
 *
 * @package INFTNC\Modules\YoutubeEmbed
 * @since ??
 */

namespace INFTNC\Modules\YoutubeEmbed\YoutubeEmbedTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait CustomCssTrait {

	/**
	 * Custom CSS fields
	 *
	 * This function is equivalent of JS const cssFields located in
	 * src/components/youtube-embed/custom-css.ts.
	 *
	 * @since ??
	 */
	public static function custom_css() {
		return \WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/youtube-embed' )->customCssFields;
	}

}
