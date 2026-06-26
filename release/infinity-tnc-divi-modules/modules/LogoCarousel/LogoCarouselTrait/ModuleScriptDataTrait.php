<?php
/**
 * LogoCarousel::module_script_data().
 *
 * @package INFTNC\Modules\LogoCarousel
 * @since ??
 */

namespace INFTNC\Modules\LogoCarousel\LogoCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleScriptDataTrait {

	/**
	 * LogoCarousel module script data.
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
