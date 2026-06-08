<?php
/**
 * TypeWriter::module_styles()
 *
 * @package INFTNC\Modules\TypeWriter
 * @since ??
 */

namespace INFTNC\Modules\TypeWriter\TypeWriterTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * TypeWriter module styles callback.
	 *
	 * @since ??
	 *
	 * @param array $args Style arguments.
	 *
	 * @return void
	 */
	public static function module_styles( $args ) {
		$attrs                       = $args['attrs'] ?? [];
		$elements                    = $args['elements'];
		$settings                    = $args['settings'] ?? [];
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

		Style::add(
			[
				'id'            => $args['id'],
				'name'          => $args['name'],
				'orderIndex'    => $args['orderIndex'],
				'storeInstance' => $args['storeInstance'],
				'styles'        => [
					// Module decoration styles (background, spacing, etc.)
					$elements->style(
						[
							'attrName'   => 'module',
							'styleProps' => [
								'defaultPrintedStyleAttrs' => $default_printed_style_attrs['module']['decoration'] ?? [],
								'disabledOn'               => [
									'disabledModuleVisibility' => $settings['disabledModuleVisibility'] ?? null,
								],
							],
						]
					),

					// Typing text font styles.
					$elements->style(
						[
							'attrName' => 'typingText',
						]
					),

					// Before text font styles.
					$elements->style(
						[
							'attrName' => 'beforeText',
						]
					),

					// After text font styles.
					$elements->style(
						[
							'attrName' => 'afterText',
						]
					),

					// Custom CSS.
					CssStyle::style(
						[
							'selector'  => $args['orderClass'],
							'attr'      => $attrs['css'] ?? [],
							'cssFields' => self::custom_css(),
						]
					),
				],
			]
		);
	}
}
