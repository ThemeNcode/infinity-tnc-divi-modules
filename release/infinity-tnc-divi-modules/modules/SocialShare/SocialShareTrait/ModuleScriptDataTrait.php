<?php
/**
 * SocialShare::module_script_data().
 *
 * @package INFTNC\Modules\SocialShare
 * @since ??
 */

namespace INFTNC\Modules\SocialShare\SocialShareTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleScriptDataTrait {

	/**
	 * SocialShare module script data.
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
