<?php
/**
 * SocialShareChild::module_styles().
 *
 * @package INFTNC\Modules\SocialShareChild
 * @since ??
 */

namespace INFTNC\Modules\SocialShareChild\SocialShareChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * SocialShareChild module styles.
	 *
	 * @since ??
	 *
	 * @param array $args
	 *
	 * @return void
	 */
	public static function module_styles( array $args ): void {
		$attrs                       = $args['attrs'] ?? [];
		$elements                    = $args['elements'];
		$settings                    = $args['settings'] ?? [];
		$order_class                 = $args['orderClass'] ?? '';
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

		$data = $attrs['socialShareChildData']['innerContent']['desktop']['value'] ?? [];

		$button_color_child         = $data['button_color_child'] ?? '';
		$button_padding_child_top   = $data['button_padding_child_top'] ?? '';
		$button_padding_child_right = $data['button_padding_child_right'] ?? '';
		$button_padding_child_bottom = $data['button_padding_child_bottom'] ?? '';
		$button_padding_child_left  = $data['button_padding_child_left'] ?? '';
		$icon_color_child           = $data['icon_color_child'] ?? '';
		$icon_size_child            = $data['icon_size_child'] ?? '';

		$module_css = [];
		$button_css = [];
		$link_css   = [];
		$icon_css   = [];

		// Full width share button.
		$button_css[] = 'width:100%;';
		$module_css[] = 'margin-bottom:0 !important;';

		if ( ! empty( $button_color_child ) ) {
			$link_css[] = sprintf( 'background-color:%s !important;', esc_attr( $button_color_child ) );
		}

		if ( ! empty( $icon_color_child ) ) {
			$icon_css[] = sprintf( 'color:%s !important;', esc_attr( $icon_color_child ) );
		}

		if ( ! empty( $icon_size_child ) ) {
			$size_value = is_numeric( $icon_size_child ) ? $icon_size_child . 'px' : $icon_size_child;
			$icon_css[] = sprintf( 'font-size:%s !important;', esc_attr( $size_value ) );
		}

		// Button padding child from 4 separate range fields.
		if ( $button_padding_child_top || $button_padding_child_right || $button_padding_child_bottom || $button_padding_child_left ) {
			$link_css[] = sprintf(
				'padding:%s %s %s %s !important;',
				esc_attr( $button_padding_child_top ?: '0' ),
				esc_attr( $button_padding_child_right ?: '0' ),
				esc_attr( $button_padding_child_bottom ?: '0' ),
				esc_attr( $button_padding_child_left ?: '0' )
			);
		}

		$styles = [
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
			$elements->style( [ 'attrName' => 'buttonText' ] ),
			CssStyle::style(
				[
					'selector'  => $order_class,
					'attr'      => $attrs['css'] ?? [],
					'cssFields' => self::custom_css(),
				]
			),
		];

		if ( ! empty( $module_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => $order_class,
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $module_css ) ] ] ],
			] );
		}
		if ( ! empty( $button_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_share_button",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $button_css ) ] ] ],
			] );
		}
		if ( ! empty( $link_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_share_link",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $link_css ) ] ] ],
			] );
		}
		if ( ! empty( $icon_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_social_icon",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $icon_css ) ] ] ],
			] );
		}

		Style::add(
			[
				'id'            => $args['id'],
				'name'          => $args['name'],
				'orderIndex'    => $args['orderIndex'],
				'storeInstance' => $args['storeInstance'],
				'styles'        => $styles,
			]
		);
	}
}
