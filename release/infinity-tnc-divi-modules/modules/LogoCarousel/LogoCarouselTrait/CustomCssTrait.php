<?php
/**
 * LogoCarousel custom CSS fields.
 *
 * @package INFTNC\Modules\LogoCarousel
 * @since ??
 */

namespace INFTNC\Modules\LogoCarousel\LogoCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use WP_Block_Type_Registry;

trait CustomCssTrait {

	/**
	 * Custom CSS fields for the LogoCarousel module.
	 *
	 * @since ??
	 *
	 * @return array
	 */
	public static function custom_css(): array {
		return WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/logo-carousel' )->customCssFields;
	}
}
