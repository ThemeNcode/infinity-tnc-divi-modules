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
		$button_padding_top    = $data['button_padding_top'] ?? '';
		$button_padding_right  = $data['button_padding_right'] ?? '';
		$button_padding_bottom = $data['button_padding_bottom'] ?? '';
		$button_padding_left   = $data['button_padding_left'] ?? '';

		// divi/select inside group-items can store a numeric index — resolve to string value.
		$button_layout_keys = [ 'icon_with_text', 'only_icon', 'only_text' ];
		if ( is_numeric( $button_layout ) ) {
			$button_layout = $button_layout_keys[ (int) $button_layout ] ?? 'icon_with_text';
		}

		$button_shape_keys = [ 'button_square', 'button_rounded', 'button_circle' ];
		if ( is_numeric( $button_shape ) ) {
			$button_shape = $button_shape_keys[ (int) $button_shape ] ?? 'button_square';
		}

		$columns_keys = [ 'column_auto', 'column_one', 'column_two', 'column_three', 'column_four', 'column_five', 'column_six' ];
		if ( is_numeric( $columns ) ) {
			$columns = $columns_keys[ (int) $columns ] ?? 'column_auto';
		}

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

		$wrapper_css = [];
		$link_css    = [];
		$icon_css    = [];
		$text_css    = [];

		// Wrapper grid / flex layout.
		if ( $only_icon && $is_circle && 'column_auto' === $columns ) {
			$wrapper_css[] = sprintf( 'display:flex !important; flex-direction:row !important; flex-wrap:wrap !important; column-gap:%s; row-gap:%s;', esc_attr( $columns_gap ), esc_attr( $row_gap ) );
		} else {
			$grid_columns = $column_map[ $columns ] ?? $column_map['column_auto'];
			$wrapper_css[] = sprintf( 'display:grid; grid-template-columns:%s; column-gap:%s; row-gap:%s;', $grid_columns, esc_attr( $columns_gap ), esc_attr( $row_gap ) );
		}

		// Button background.
		if ( ! empty( $button_bg ) ) {
			$link_css[] = sprintf( 'background-color:%s;', esc_attr( $button_bg ) );
		}

		// Button shape.
		if ( $is_circle && $only_icon ) {
			$link_css[] = 'border-radius:50% !important; aspect-ratio:1/1 !important; padding:10px !important; display:inline-flex !important; justify-content:center !important; align-items:center !important; width:auto !important;';
			$icon_css[] = 'margin-left:0 !important;';
		} elseif ( $is_circle ) {
			$link_css[] = 'border-radius:30px;';
		} elseif ( $is_rounded ) {
			$link_css[] = 'border-radius:10px;';
		} else {
			$link_css[] = 'border-radius:0;';
		}

		// Only icon.
		if ( $only_icon ) {
			$text_css[] = 'display:none;';
			if ( ! $is_circle ) {
				$link_css[] = 'justify-content:center;';
			}
		}

		// Only text.
		if ( $only_text ) {
			$icon_css[] = 'display:none;';
		}

		// Icon color.
		if ( ! empty( $icon_color ) ) {
			$icon_css[] = sprintf( 'color:%s;', esc_attr( $icon_color ) );
		}

		// Icon size.
		if ( ! empty( $icon_size ) ) {
			$size_value  = is_numeric( $icon_size ) ? $icon_size . 'px' : $icon_size;
			$icon_css[] = sprintf( 'font-size:%s !important;', esc_attr( $size_value ) );
		}

		// Button padding — skip for circle+icon-only (aspect-ratio circle needs equal padding).
		if ( ! ( $is_circle && $only_icon ) ) {
			if ( $button_padding_top || $button_padding_right || $button_padding_bottom || $button_padding_left ) {
				$link_css[] = sprintf(
					'padding:%s %s %s %s !important;',
					esc_attr( $button_padding_top ?: '0' ),
					esc_attr( $button_padding_right ?: '0' ),
					esc_attr( $button_padding_bottom ?: '0' ),
					esc_attr( $button_padding_left ?: '0' )
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

		if ( ! empty( $wrapper_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_social_share_wrapper",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $wrapper_css ) ] ] ],
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
		if ( ! empty( $text_css ) ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_social_text",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => implode( ' ', $text_css ) ] ] ],
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
