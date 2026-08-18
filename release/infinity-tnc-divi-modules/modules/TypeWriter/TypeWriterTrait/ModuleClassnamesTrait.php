<?php
/**
 * TypeWriter::module_classnames()
 *
 * @package INFTNC\Modules\TypeWriter
 * @since ??
 */

namespace INFTNC\Modules\TypeWriter\TypeWriterTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait ModuleClassnamesTrait {

	/**
	 * Module classnames for TypeWriter.
	 *
	 * @since ??
	 *
	 * @param array $args {
	 *   @type object $classnamesInstance Module classnames instance.
	 *   @type array  $attrs              Block attributes.
	 * }
	 *
	 * @return void
	 */
	public static function module_classnames( array $args ): void {
		// No additional classnames needed.
	}
}
