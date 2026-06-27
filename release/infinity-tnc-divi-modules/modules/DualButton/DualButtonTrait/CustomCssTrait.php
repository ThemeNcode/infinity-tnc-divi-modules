<?php
/**
 * DualButton Custom CSS fields.
 *
 * @package INFTNC\Modules\DualButton
 * @since ??
 */

namespace INFTNC\Modules\DualButton\DualButtonTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait CustomCssTrait {

	/**
	 * Custom CSS fields definition.
	 *
	 * @since ??
	 *
	 * @return array
	 */
	public static function custom_css(): array {
		return [
			'button_wrapper' => [
				'subName'        => 'button_wrapper',
				'selectorSuffix' => ' .inftnc_button_wrapper',
			],
			'left_button'    => [
				'subName'        => 'left_button',
				'selectorSuffix' => ' .inftnc_pb_button_left',
			],
			'right_button'   => [
				'subName'        => 'right_button',
				'selectorSuffix' => ' .inftnc_pb_button_right',
			],
		];
	}
}
