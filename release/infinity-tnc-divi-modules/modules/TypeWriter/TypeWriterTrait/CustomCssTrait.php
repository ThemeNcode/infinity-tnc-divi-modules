<?php
/**
 * TypeWriter custom CSS fields.
 *
 * @package INFTNC\Modules\TypeWriter
 * @since ??
 */

namespace INFTNC\Modules\TypeWriter\TypeWriterTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait CustomCssTrait {

	/**
	 * Custom CSS fields for the TypeWriter module.
	 *
	 * @since ??
	 *
	 * @return array
	 */
	public static function custom_css(): array {
		return \WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/type-writer' )->customCssFields ?? [];
	}
}
