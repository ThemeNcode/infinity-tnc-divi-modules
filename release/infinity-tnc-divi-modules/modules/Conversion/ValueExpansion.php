<?php
/**
 * Divi 4 -> Divi 5 conversion value expansion callbacks.
 *
 * @package INFTNC\Modules\Conversion
 * @since ??
 */

namespace INFTNC\Modules\Conversion;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Value expansion callbacks registered on the
 * `divi.moduleLibrary.conversion.valueExpansionFunctionMap` filter.
 *
 * Divi appends each key returned here to the module's outline path, so returning
 * `[ 'button_padding_top' => '10px' ]` for an outline entry of
 * `socialShareData.innerContent.*` writes
 * `socialShareData.innerContent.desktop.value.button_padding_top`.
 *
 * @since ??
 */
class ValueExpansion {

	/**
	 * Expand the Social Share (parent) share-button padding.
	 *
	 * @since ??
	 *
	 * @param string $value Divi 4 combined padding string.
	 * @param array  $args  Conversion context. Unused.
	 *
	 * @return array Divi 5 sub-attributes.
	 */
	public static function share_button_padding( $value, $args = [] ): array {
		return self::split_combined_padding( $value, 'button_padding' );
	}

	/**
	 * Expand the Social Share Child share-button padding.
	 *
	 * @since ??
	 *
	 * @param string $value Divi 4 combined padding string.
	 * @param array  $args  Conversion context. Unused.
	 *
	 * @return array Divi 5 sub-attributes.
	 */
	public static function share_button_padding_child( $value, $args = [] ): array {
		return self::split_combined_padding( $value, 'button_padding_child' );
	}

	/**
	 * Split a Divi 4 `custom_margin` style value into separate Divi 5 attributes.
	 *
	 * Divi 4 stores the share-button padding as a single pipe-delimited string
	 * ("top|right|bottom|left|..."), while the Divi 5 module reads four separate
	 * attributes. Sides left empty in Divi 4 are omitted rather than forced to a
	 * value, so the Divi 5 module default applies to them instead of inventing one.
	 *
	 * @since ??
	 *
	 * @param string $value  Divi 4 combined padding string.
	 * @param string $prefix Divi 5 attribute prefix (e.g. `button_padding`).
	 *
	 * @return array Divi 5 sub-attributes, keyed by `{$prefix}_{$side}`.
	 */
	private static function split_combined_padding( $value, string $prefix ): array {
		if ( ! is_string( $value ) || '' === trim( $value ) ) {
			return [];
		}

		$parts    = explode( '|', $value );
		$sides    = [ 'top', 'right', 'bottom', 'left' ];
		$expanded = [];

		foreach ( $sides as $index => $side ) {
			$side_value = isset( $parts[ $index ] ) ? trim( $parts[ $index ] ) : '';

			if ( '' !== $side_value ) {
				$expanded[ "{$prefix}_{$side}" ] = $side_value;
			}
		}

		return $expanded;
	}
}
