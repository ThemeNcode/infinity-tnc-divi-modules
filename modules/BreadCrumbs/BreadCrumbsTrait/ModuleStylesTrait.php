<?php
/**
 * BreadCrumbs::module_styles().
 *
 * @package INFTNC\Modules\BreadCrumbs
 * @since ??
 */

namespace INFTNC\Modules\BreadCrumbs\BreadCrumbsTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * BreadCrumbs module's style components.
	 *
	 * This function is equivalent of JS function ModuleStyles located in
	 * src/components/bread-crumbs/styles.tsx.
	 *
	 * @since ??
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *      @type string $id                Module ID.
	 *      @type string $name              Module name.
	 *      @type string $attrs             Module attributes.
	 *      @type string $orderClass        Selector class name.
	 *      @type string $settings          Custom settings.
	 *      @type string $state             Attributes state.
	 *      @type string $mode              Style mode.
	 *      @type ModuleElements $elements  ModuleElements instance.
	 * }
	 */
	public static function module_styles( $args ) {
		$attrs                       = $args['attrs'] ?? [];
		$elements                    = $args['elements'];
		$settings                    = $args['settings'] ?? [];
		$order_class                 = $args['orderClass'] ?? '';
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

		$bread_crumbs_data = $attrs['breadCrumbsData']['innerContent']['desktop']['value'] ?? [];

		$link_color          = $bread_crumbs_data['link_color'] ?? '';
		$seperate_icon_color = $bread_crumbs_data['seperate_icon_color'] ?? '';
		$current_text_color  = $bread_crumbs_data['current_text_color'] ?? '';
		$before_text_color   = $bread_crumbs_data['before_text_color'] ?? '';

		$styles = [
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

			// Breadcrumb font styles.
			$elements->style( [ 'attrName' => 'breadcrumbText' ] ),

			// Link color.
			CssStyle::style(
				[
					'selector' => "{$order_class} a",
					'attr'     => [
						'desktop' => [
							'value' => [
								'mainElement' => ! empty( $link_color ) ? 'color: ' . esc_attr( $link_color ) . ';' : '',
							],
						],
					],
				]
			),

			// Separator icon color.
			CssStyle::style(
				[
					'selector' => "{$order_class} .inftnc_separator",
					'attr'     => [
						'desktop' => [
							'value' => [
								'mainElement' => ! empty( $seperate_icon_color ) ? 'color: ' . esc_attr( $seperate_icon_color ) . ';' : '',
							],
						],
					],
				]
			),

			// Current page text color.
			CssStyle::style(
				[
					'selector' => "{$order_class} .inftnc_current",
					'attr'     => [
						'desktop' => [
							'value' => [
								'mainElement' => ! empty( $current_text_color ) ? 'color: ' . esc_attr( $current_text_color ) . ';' : '',
							],
						],
					],
				]
			),

			// Before text color.
			CssStyle::style(
				[
					'selector' => "{$order_class} .inftnc_before",
					'attr'     => [
						'desktop' => [
							'value' => [
								'mainElement' => ! empty( $before_text_color ) ? 'color: ' . esc_attr( $before_text_color ) . ';' : '',
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
