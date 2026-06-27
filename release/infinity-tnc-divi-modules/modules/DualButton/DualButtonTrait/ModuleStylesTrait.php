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
use ET\Builder\Packages\IconLibrary\IconFont\Utils;
use ET\Builder\Packages\StyleLibrary\Utils\StyleDeclarations;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * Icon style declaration: content + font-family + margin + line-height for pseudo-element.
	 * Matches D5 ButtonModule::icon_style_declaration().
	 *
	 * @param array $args { 'attrValue' => button decoration value at resolved breakpoint }
	 *
	 * @return string
	 */
	public static function icon_style_declaration( array $args ): string {
		$attr_value = $args['attrValue'] ?? [];

		$declarations = new StyleDeclarations(
			[
				'returnType' => 'string',
				'important'  => [
					'font-family' => true,
					'font-size'   => true,
					'line-height' => true,
				],
			]
		);

		$icon_settings = $attr_value['icon']['settings'] ?? [];

		if ( ! empty( $icon_settings ) ) {
			$icon_unicode = Utils::escape_font_icon( Utils::process_font_icon( $icon_settings ) );
			$declarations->add( 'content', "'{$icon_unicode}'" );

			$font_family = 'fa' === ( $icon_settings['type'] ?? '' ) ? 'FontAwesome' : 'ETmodules';
			$declarations->add( 'font-family', $font_family );
		}

		$icon_placement  = $attr_value['icon']['placement'] ?? 'right';
		$has_custom_icon = ! empty( $attr_value['icon']['settings']['unicode'] );

		if ( 'left' === $icon_placement ) {
			$declarations->add( 'margin-left', '-1.3em' );
		} elseif ( $has_custom_icon ) {
			$declarations->add( 'margin-left', '0.3em' );
		}

		$declarations->add( 'line-height', '1em' );

		return $declarations->value();
	}

	/**
	 * Spacing declaration: padding when icon is show-on-hover.
	 * Matches D5 ButtonModule::button_spacing_style_declaration().
	 *
	 * @param array $args { 'attrValue' => button decoration value at resolved breakpoint }
	 *
	 * @return string
	 */
	public static function button_spacing_style_declaration( array $args ): string {
		$attr_value = $args['attrValue'] ?? [];

		$declarations = new StyleDeclarations(
			[
				'returnType' => 'string',
				'important'  => false,
			]
		);

		if ( 'on' === ( $attr_value['icon']['onHover'] ?? '' ) ) {
			$declarations->add( 'padding-left',  '1em' );
			$declarations->add( 'padding-right', '1em' );
		}

		return $declarations->value();
	}

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
		$alignment = $data['button_alignment'] ?? 'left';
		$gap       = $data['button_gap']       ?? '10px';

		$left_btn_value  = $attrs['buttonLeft']['decoration']['button']['desktop']['value']  ?? [];
		$right_btn_value = $attrs['buttonRight']['decoration']['button']['desktop']['value'] ?? [];
		$left_pseudo     = 'left' === ( $left_btn_value['icon']['placement']  ?? 'right' ) ? 'before' : 'after';
		$right_pseudo    = 'left' === ( $right_btn_value['icon']['placement'] ?? 'right' ) ? 'before' : 'after';

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

					// Left button styles + icon CSS (D5 button pattern).
					$elements->style(
						[
							'attrName'   => 'buttonLeft',
							'styleProps' => [
								'advancedStyles' => [
									[
										'componentName' => 'divi/common',
										'props'         => [
											'selector' => implode(
												', ',
												[
													"body #page-container .et_pb_section {$order_class} .inftnc_pb_button_left::{$left_pseudo}",
													"body #page-container .et_pb_section {$order_class} .inftnc_pb_button_left:hover::{$left_pseudo}",
												]
											),
											'attr'                => $attrs['buttonLeft']['decoration']['button'] ?? [],
											'declarationFunction' => [ self::class, 'icon_style_declaration' ],
										],
									],
									[
										'componentName' => 'divi/common',
										'props'         => [
											'selector'            => "body #page-container {$order_class}",
											'attr'                => $attrs['buttonLeft']['decoration']['button'] ?? [],
											'declarationFunction' => [ self::class, 'button_spacing_style_declaration' ],
										],
									],
								],
							],
						]
					),

					// Right button styles + icon CSS (D5 button pattern).
					$elements->style(
						[
							'attrName'   => 'buttonRight',
							'styleProps' => [
								'advancedStyles' => [
									[
										'componentName' => 'divi/common',
										'props'         => [
											'selector' => implode(
												', ',
												[
													"body #page-container .et_pb_section {$order_class} .inftnc_pb_button_right::{$right_pseudo}",
													"body #page-container .et_pb_section {$order_class} .inftnc_pb_button_right:hover::{$right_pseudo}",
												]
											),
											'attr'                => $attrs['buttonRight']['decoration']['button'] ?? [],
											'declarationFunction' => [ self::class, 'icon_style_declaration' ],
										],
									],
									[
										'componentName' => 'divi/common',
										'props'         => [
											'selector'            => "body #page-container {$order_class}",
											'attr'                => $attrs['buttonRight']['decoration']['button'] ?? [],
											'declarationFunction' => [ self::class, 'button_spacing_style_declaration' ],
										],
									],
								],
							],
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
