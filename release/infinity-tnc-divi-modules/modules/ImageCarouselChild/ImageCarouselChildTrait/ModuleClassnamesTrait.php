<?php
/**
 * ImageCarouselChild::module_classnames().
 *
 * @package INFTNC\Modules\ImageCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\ImageCarouselChild\ImageCarouselChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames for the ImageCarouselChild module.
	 *
	 * @since ??
	 *
	 * @param array $args
	 *
	 * @return void
	 */
	public static function module_classnames( array $args ): void {
		$classnames_instance = $args['classnamesInstance'];

		$classnames_instance->add( 'inftnc_image_carousel_child' );
	}
}
