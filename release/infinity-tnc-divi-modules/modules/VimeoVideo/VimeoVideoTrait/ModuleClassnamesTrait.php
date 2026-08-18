<?php
/**
 * VimeoVideo::module_classnames().
 *
 * @package INFTNC\Modules\VimeoVideo
 * @since ??
 */

namespace INFTNC\Modules\VimeoVideo\VimeoVideoTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames function for Vimeo Video module.
	 *
	 * This function is equivalent of JS function moduleClassnames located in
	 * src/components/vimeo-video/module-classnames.ts.
	 *
	 * @since ??
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *     @type object $classnamesInstance Instance of ET\Builder\Packages\Module\Layout\Components\Classnames.
	 *     @type array  $attrs              Block attributes data that being rendered.
	 * }
	 */
	public static function module_classnames( $args ) {
		// No additional classnames needed for embed map module.
	}

}
