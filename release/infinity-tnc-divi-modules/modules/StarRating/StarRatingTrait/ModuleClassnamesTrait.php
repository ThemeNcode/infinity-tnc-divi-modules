<?php
/**
 * StarRating::module_classnames()
 *
 * @package INFTNC\Modules\StarRating
 * @since ??
 */

namespace INFTNC\Modules\StarRating\StarRatingTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames for StarRating.
	 *
	 * @since ??
	 *
	 * @param array $args Function arguments.
	 *
	 * @return void
	 */
	public static function module_classnames( array $args ): void {
		// No additional classnames needed.
	}
}
