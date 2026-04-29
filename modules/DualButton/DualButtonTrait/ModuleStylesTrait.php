<?php
/**
 * DualButton::module_styles()
 *
 * @package INFTNC\Modules\DualButton
 * @since ??
 */

namespace INFTNC\Modules\DualButton\DualButtonTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * Module styles callback.
	 *
	 * @since ??
	 *
	 * @param array $args Style arguments.
	 *
	 * @return void
	 */
	public static function module_styles( array $args ) {
		$attrs                       = $args['attrs'] ?? [];
		$elements                    = $args['elements'];
		$settings                    = $args['settings'] ?? [];
		$order_class                 = $args['orderClass'] ?? '';
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

		$data      = $attrs['dualButtonData']['innerContent']['desktop']['value'] ?? [];
		$alignment = $data['button_alignment'] ?? 'flex-start';
		$gap       = $data['button_gap']       ?? '10px';

		$wrapper_declaration = "justify-content: {$alignment}; gap: {$gap};";

		Style::add(
			[
				'id'            => $args['id'],
				'name'          => $args['name'],
				'orderIndex'    => $args['orderIndex'],
				'storeInstance' => $args['storeInstance'],
				'styles'        => [
					// Module decoration styles.
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

					// Left button styles.
					$elements->style(
						[
							'attrName' => 'buttonLeft',
						]
					),

					// Right button styles.
					$elements->style(
						[
							'attrName' => 'buttonRight',
						]
					),

					// Wrapper layout CSS (alignment + gap).
					CssStyle::style(
						[
							'selector' => "{$order_class} .inftnc_button_wrapper",
							'attr'     => [
								'desktop' => [
									'value' => [
										'mainElement' => $wrapper_declaration,
									],
								],
							],
						]
					),

					// Custom CSS.
					CssStyle::style(
						[
							'selector'  => $order_class,
							'attr'      => $attrs['css'] ?? [],
							'cssFields' => self::custom_css(),
						]
					),
				],
			]
		);
	}
}
