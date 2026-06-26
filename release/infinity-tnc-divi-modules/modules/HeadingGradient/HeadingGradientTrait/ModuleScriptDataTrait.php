<?php
/**
 * HeadingGradient::module_script_data()
 *
 * @package INFTNC\Modules\HeadingGradient
 * @since ??
 */

namespace INFTNC\Modules\HeadingGradient\HeadingGradientTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Packages\Module\Options\Element\ElementScriptData;

trait ModuleScriptDataTrait {

	/**
	 * heading Embed module script data callback.
	 *
	 * @since ??
	 *
	 * @param array $args {
	 *   Array of arguments.
	 *
	 *   @type string $id       Module id.
	 *   @type string $selector Module selector.
	 *   @type array  $attrs    Module attributes.
	 * }
	 *
	 * @return void
	 */
	public static function module_script_data( $args ) {
		// Assign variables.
		$id             = $args['id'] ?? '';
		$selector       = $args['selector'] ?? '';
		$attrs          = $args['attrs'] ?? [];
		$store_instance = $args['storeInstance'] ?? null;

		// Module decoration attributes.
		$module_decoration_attrs = $attrs['module']['decoration'] ?? [];

		ElementScriptData::set(
			[
				'id'            => $id,
				'selector'      => $selector,
				'attrs'         => array_merge(
					$module_decoration_attrs,
					[
						'link' => $args['attrs']['module']['advanced']['link'] ?? [],
					]
				),
				'storeInstance' => $store_instance,
			]
		);
	}
}
