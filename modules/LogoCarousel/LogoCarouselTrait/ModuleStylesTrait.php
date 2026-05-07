<?php
/**
 * LogoCarousel::module_styles().
 *
 * @package INFTNC\Modules\LogoCarousel
 * @since ??
 */

namespace INFTNC\Modules\LogoCarousel\LogoCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * LogoCarousel module styles.
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

		$data = $attrs['logoCarouselData']['innerContent']['desktop']['value'] ?? [];

		$logo_grayscale_default   = $data['logo_grayscale_default'] ?? 'on';
		$logo_grayscale_hover     = $data['logo_grayscale_hover'] ?? 'off';
		$logo_hover               = $data['logo_hover'] ?? 'none';
		$navigation_icon_size     = $data['navigation_icon_size'] ?? '';
		$navigation_bg_size       = $data['navigation_bg_size'] ?? '';
		$navigation_icon_color    = $data['navigation_icon_color'] ?? '';
		$navigation_bg_color      = $data['navigation_bg_color'] ?? '';
		$pagination_dots_size     = $data['pagination_dots_size'] ?? '';
		$pagination_active_dots_size = $data['pagination_active_dots_size'] ?? '';
		$pagination_dots_color    = $data['pagination_dots_color'] ?? '';
		$dots_alignment           = $data['dots_alignment'] ?? 'center';

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
			CssStyle::style(
				[
					'selector'  => $order_class,
					'attr'      => $attrs['css'] ?? [],
					'cssFields' => self::custom_css(),
				]
			),
		];

		// Navigation icon size.
		if ( $navigation_icon_size ) {
			$arrow_selector = "{$order_class} .slick-inftnc-arrow.slick-prev:before,{$order_class} .slick-inftnc-arrow.slick-next:before";
			$styles[] = CssStyle::style( [
				'selector' => $arrow_selector,
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => "font-size:{$navigation_icon_size};" ] ] ],
			] );
		}

		// Navigation button size.
		if ( $navigation_bg_size ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .slick-inftnc-arrow",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => "width:{$navigation_bg_size}!important;height:{$navigation_bg_size}!important;" ] ] ],
			] );
		}

		// Navigation icon color.
		if ( $navigation_icon_color ) {
			$arrow_selector = "{$order_class} .slick-inftnc-arrow.slick-prev:before,{$order_class} .slick-inftnc-arrow.slick-next:before";
			$styles[] = CssStyle::style( [
				'selector' => $arrow_selector,
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => sprintf( 'color:%s!important;', esc_attr( $navigation_icon_color ) ) ] ] ],
			] );
		}

		// Navigation button background color.
		if ( $navigation_bg_color ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .slick-inftnc-arrow",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => sprintf( 'background-color:%s!important;', esc_attr( $navigation_bg_color ) ) ] ] ],
			] );
		}

		// Pagination dots size.
		if ( $pagination_dots_size ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .slick-dots li button:before",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => "font-size:{$pagination_dots_size}!important;" ] ] ],
			] );
		}

		// Pagination active dots size.
		if ( $pagination_active_dots_size ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .slick-dots li.slick-active button:before",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => "font-size:{$pagination_active_dots_size}!important;" ] ] ],
			] );
		}

		// Pagination dots color.
		if ( $pagination_dots_color ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .slick-dots li button:before",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => sprintf( 'color:%s!important;', esc_attr( $pagination_dots_color ) ) ] ] ],
			] );
		}

		// Pagination dots alignment.
		if ( $dots_alignment ) {
			$justify_map = [
				'left'   => 'flex-start',
				'center' => 'center',
				'right'  => 'flex-end',
			];
			$justify  = $justify_map[ $dots_alignment ] ?? 'center';
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .slick-dots",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => "display:flex;justify-content:{$justify};margin-top:25px;" ] ] ],
			] );
		}

		// Grayscale default.
		if ( 'on' === $logo_grayscale_default ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-filter:grayscale(100%);filter:grayscale(100%);transition:filter .5s ease 0s;' ] ] ],
			] );
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-filter:grayscale(0);filter:none;' ] ] ],
			] );
		}

		// Grayscale on hover.
		if ( 'on' === $logo_grayscale_hover ) {
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-filter:grayscale(0);filter:none;transition:filter .5s ease 0s;' ] ] ],
			] );
			$styles[] = CssStyle::style( [
				'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
				'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-filter:grayscale(100%);filter:grayscale(100%);' ] ] ],
			] );
		}

		// Logo hover effects.
		switch ( $logo_hover ) {
			case 'zoom_in':
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => 'transition:transform .5s ease 0s;-webkit-transition:-webkit-transform .5s ease 0s;' ] ] ],
				] );
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-transform:scale(1.04);transform:scale(1.04);' ] ] ],
				] );
				break;
			case 'zoom_out':
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => 'transition:transform .5s ease 0s;transform:scale(1.04);-webkit-transform:scale(1.04);' ] ] ],
				] );
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => 'transform:scale(1);-webkit-transform:scale(1);' ] ] ],
				] );
				break;
			case 'slide':
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => 'margin-left:10px;-webkit-transform:scale(1.01,1.01);transform:scale(1.01,1.01);-webkit-transition:all .5s ease 0s;transition:all .5s ease 0s;' ] ] ],
				] );
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => 'margin-left:0;' ] ] ],
				] );
				break;
			case 'rotate':
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-transform:rotate(15deg) scale(1.4);transform:rotate(15deg) scale(1.4);-webkit-transition:all .5s ease 0s;transition:all .5s ease 0s;' ] ] ],
				] );
				$styles[] = CssStyle::style( [
					'selector' => "{$order_class} .inftnc_carousels_logo_wrapper .logo_carousel_img:hover",
					'attr'     => [ 'desktop' => [ 'value' => [ 'mainElement' => '-webkit-transform:rotate(0) scale(1);transform:rotate(0) scale(1);transition:all .5s ease 0s;' ] ] ],
				] );
				break;
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
