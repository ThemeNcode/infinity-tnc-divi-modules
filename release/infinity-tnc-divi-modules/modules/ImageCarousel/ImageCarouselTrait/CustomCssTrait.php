<?php
/**
 * ImageCarousel custom CSS fields.
 *
 * @package INFTNC\Modules\ImageCarousel
 * @since ??
 */

namespace INFTNC\Modules\ImageCarousel\ImageCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use WP_Block_Type_Registry;

trait CustomCssTrait {

	/**
	 * Custom CSS fields for the ImageCarousel module.
	 *
	 * @since ??
	 *
	 * @return array
	 */
	public static function custom_css(): array {
		return WP_Block_Type_Registry::get_instance()->get_registered( 'inftnc/image-carousel' )->customCssFields;
	}
}
