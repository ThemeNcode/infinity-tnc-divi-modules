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

		$button_color_child   = $data['button_color_child'] ?? '';
		$button_padding_child = $data['button_padding_child'] ?? '';
		$icon_color_child     = $data['icon_color_child'] ?? '';
		$icon_size_child      = $data['icon_size_child'] ?? '';

		$css_parts = [];

		// Full width share button.
		$css_parts[] = sprintf( '%s .inftnc_share_button { width:100%%; }', $order_class );
		$css_parts[] = sprintf( '%s.inftnc_social_share_child { margin-bottom:0 !important; }', $order_class );

		if ( ! empty( $button_color_child ) ) {
			$css_parts[] = sprintf( '%s .inftnc_share_link { background-color:%s !important; }', $order_class, esc_attr( $button_color_child ) );
		}

		if ( ! empty( $icon_color_child ) ) {
			$css_parts[] = sprintf( '%s .inftnc_social_icon { color:%s !important; }', $order_class, esc_attr( $icon_color_child ) );
		}

		if ( ! empty( $icon_size_child ) ) {
			$size_value  = is_numeric( $icon_size_child ) ? $icon_size_child . 'px' : $icon_size_child;
			$css_parts[] = sprintf( '%s .inftnc_social_icon { font-size:%s !important; }', $order_class, esc_attr( $size_value ) );
		}

		if ( ! empty( $button_padding_child ) ) {
			$parts = explode( '|', $button_padding_child );
			if ( 4 === count( $parts ) ) {
				$css_parts[] = sprintf(
					'%s .inftnc_share_link { padding:%s %s %s %s !important; }',
					$order_class,
					esc_attr( $parts[0] ),
					esc_attr( $parts[1] ),
					esc_attr( $parts[2] ),
					esc_attr( $parts[3] )
				);
			}
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
			implode( "\n", $css_parts ),
		];

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
