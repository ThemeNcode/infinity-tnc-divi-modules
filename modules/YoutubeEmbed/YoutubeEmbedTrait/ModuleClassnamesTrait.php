<?php
/**
 * YoutubeEmbed::module_classnames()
 *
 * @package INFTNC\Modules\YoutubeEmbed
 * @since ??
 */

namespace INFTNC\Modules\YoutubeEmbed\YoutubeEmbedTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Packages\Module\Layout\Classnames;

trait ModuleClassnamesTrait {

	/**
	 * Youtube Embed module classnames callback.
	 *
	 * @since ??
	 *
	 * @param Classnames $classnames Classnames instance.
	 *
	 * @return void
	 */
	public static function module_classnames( $args ) {
		$classnames = $args['classnamesInstance'];
		$classnames->add( 'inftnc_youtube_video' );
	}
}
