<?php
/**
 * ImageCarousel::module_script_data().
 *
 * @package INFTNC\Modules\ImageCarousel
 * @since ??
 */

namespace INFTNC\Modules\ImageCarousel\ImageCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleScriptDataTrait {

	/**
	 * ImageCarousel module script data.
	 *
	 * @since ??
	 *
	 * @param array $args
	 *
	 * @return void
	 */
	public static function module_script_data( array $args ): void {
		$elements = $args['elements'];

		$elements->script_data(
			[
				'attrName' => 'module',
			]
		);
	}
}
