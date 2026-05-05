<?php
/**
 * SocialShare::module_styles().
 *
 * @package INFTNC\Modules\SocialShare
 * @since ??
 */

namespace INFTNC\Modules\SocialShare\SocialShareTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * SocialShare module styles.
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

		$data = $attrs['socialShareData']['innerContent']['desktop']['value'] ?? [];

		$button_layout  = $data['button_layout'] ?? 'icon_with_text';
		$button_shape   = $data['button_shape'] ?? 'button_square';
		$columns        = $data['columns'] ?? 'column_auto';
		$columns_gap    = $data['columns_gap'] ?? '10px';
		$row_gap        = $data['row_gap'] ?? '10px';
		$button_bg      = $data['button_bg'] ?? '';
		$icon_color     = $data['icon_color'] ?? '';
		$icon_size      = $data['icon_size'] ?? '';
		$button_padding = $data['button_padding'] ?? '';

		$column_map = [
			'column_auto'  => 'repeat(auto-fill, minmax(200px, 1fr))',
			'column_one'   => 'repeat(1, 1fr)',
			'column_two'   => 'repeat(2, 1fr)',
			'column_three' => 'repeat(3, 1fr)',
			'column_four'  => 'repeat(4, 1fr)',
			'column_five'  => 'repeat(5, 1fr)',
			'column_six'   => 'repeat(6, 1fr)',
		];

		$only_icon  = 'only_icon' === $button_layout;
		$only_text  = 'only_text' === $button_layout;
		$is_circle  = 'button_circle' === $button_shape;
		$is_rounded = 'button_rounded' === $button_shape;

		$css_parts = [];

		// Wrapper grid / flex layout.
		if ( $only_icon && $is_circle && 'column_auto' === $columns ) {
			$css_parts[] = sprintf(
				'%s .inftnc_social_share_wrapper { display:flex !important; flex-direction:row !important; flex-wrap:wrap !important; column-gap:%s; row-gap:%s; }',
				$order_class, esc_attr( $columns_gap ), esc_attr( $row_gap )
			);
		} else {
			$grid_columns = $column_map[ $columns ] ?? $column_map['column_auto'];
			$css_parts[]  = sprintf(
				'%s .inftnc_social_share_wrapper { display:grid; grid-template-columns:%s; column-gap:%s; row-gap:%s; }',
				$order_class, $grid_columns, esc_attr( $columns_gap ), esc_attr( $row_gap )
			);
		}

		// Button background.
		if ( ! empty( $button_bg ) ) {
			$css_parts[] = sprintf( '%s .inftnc_share_link { background-color:%s; }', $order_class, esc_attr( $button_bg ) );
		}

		// Button shape.
		if ( $is_circle && $only_icon ) {
			$css_parts[] = sprintf( '%s .inftnc_share_link { border-radius:100px; width:45px; padding:10px; text-align:center; display:unset !important; }', $order_class );
			$css_parts[] = sprintf( '%s .inftnc_social_icon { margin-left:unset; }', $order_class );
		} elseif ( $is_circle ) {
			$css_parts[] = sprintf( '%s .inftnc_share_link { border-radius:30px; }', $order_class );
		} elseif ( $is_rounded ) {
			$css_parts[] = sprintf( '%s .inftnc_share_link { border-radius:10px; }', $order_class );
		} else {
			$css_parts[] = sprintf( '%s .inftnc_share_link { border-radius:0; }', $order_class );
		}

		// Only icon.
		if ( $only_icon ) {
			$css_parts[] = sprintf( '%s .inftnc_social_text { display:none; }', $order_class );
			if ( ! $is_circle ) {
				$css_parts[] = sprintf( '%s .inftnc_share_link { justify-content:center; }', $order_class );
			}
		}

		// Only text.
		if ( $only_text ) {
			$css_parts[] = sprintf( '%s .inftnc_social_icon { display:none; }', $order_class );
		}

		// Icon color.
		if ( ! empty( $icon_color ) ) {
			$css_parts[] = sprintf( '%s .inftnc_social_icon { color:%s; }', $order_class, esc_attr( $icon_color ) );
		}

		// Icon size.
		if ( ! empty( $icon_size ) ) {
			$size_value  = is_numeric( $icon_size ) ? $icon_size . 'px' : $icon_size;
			$css_parts[] = sprintf( '%s .inftnc_social_icon { font-size:%s; }', $order_class, esc_attr( $size_value ) );
		}

		// Button padding.
		if ( ! empty( $button_padding ) ) {
			$parts = explode( '|', $button_padding );
			if ( 4 === count( $parts ) ) {
				$css_parts[] = sprintf(
					'%s .inftnc_share_link { padding:%s %s %s %s; }',
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
		];

		if ( ! empty( $css_parts ) ) {
			$styles[] = implode( "\n", $css_parts );
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
