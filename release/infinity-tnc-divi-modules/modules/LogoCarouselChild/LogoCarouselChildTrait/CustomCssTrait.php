<?php
/**
 * LogoCarouselChild custom CSS fields.
 *
 * @package INFTNC\Modules\LogoCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\LogoCarouselChild\LogoCarouselChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use WP_Block_Type_Registry;

trait CustomCssTrait {

	/**
	 * Custom CSS fields for the LogoCarouselChild module.
	 *
	 * @since ??
	 *
	 * @return array
	 */
	public static function custom_css(): array {
		return WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/logo-carousel-child' )->customCssFields;
	}
}
