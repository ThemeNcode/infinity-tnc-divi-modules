<?php
/**
 * SocialShareChild::module_classnames().
 *
 * @package INFTNC\Modules\SocialShareChild
 * @since ??
 */

namespace INFTNC\Modules\SocialShareChild\SocialShareChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames function for the SocialShareChild module.
	 *
	 * @since ??
	 *
	 * @param array $args {
	 *     @type object $classnamesInstance Module classnames instance.
	 *     @type array  $attrs              Block attributes.
	 * }
	 *
	 * @return void
	 */
	public static function module_classnames( array $args ): void {
		$classnames_instance = $args['classnamesInstance'];

		$classnames_instance->add( 'inftnc_social_share_icon' );
		$classnames_instance->add( 'inftnc_social_share_button' );
	}
}
