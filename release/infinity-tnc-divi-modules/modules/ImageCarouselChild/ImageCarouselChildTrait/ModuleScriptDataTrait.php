<?php
/**
 * ImageCarouselChild::module_script_data().
 *
 * @package INFTNC\Modules\ImageCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\ImageCarouselChild\ImageCarouselChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleScriptDataTrait {

	/**
	 * ImageCarouselChild module script data.
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
