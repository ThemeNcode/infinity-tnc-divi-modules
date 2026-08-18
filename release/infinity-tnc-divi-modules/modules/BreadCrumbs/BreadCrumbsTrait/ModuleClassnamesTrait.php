<?php
/**
 * BreadCrumbs::module_classnames().
 *
 * @package INFTNC\Modules\BreadCrumbs
 * @since ??
 */

namespace INFTNC\Modules\BreadCrumbs\BreadCrumbsTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames function for BreadCrumbs module.
	 *
	 * This function is equivalent of JS function moduleClassnames located in
	 * src/components/bread-crumbs/module-classnames.ts.
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
		// No additional classnames needed for breadcrumbs module.
	}

}
