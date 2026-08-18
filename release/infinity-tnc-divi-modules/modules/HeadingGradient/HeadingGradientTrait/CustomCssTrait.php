<?php
/**
 * HeadingGradient::custom_css().
 *
 * @package INFTNC\Modules\HeadingGradient
 * @since ??
 */

namespace INFTNC\Modules\HeadingGradient\HeadingGradientTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait CustomCssTrait {

	/**
	 * Custom CSS fields
	 *
	 * This function is equivalent of JS const cssFields located in
	 * src/components/heading-gradient/custom-css.ts.
	 *
	 * @since ??
	 */
	public static function custom_css() {
		return \WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/heading-gradient' )->customCssFields;
	}

}
