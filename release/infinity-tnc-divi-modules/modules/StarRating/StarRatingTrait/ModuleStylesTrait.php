<?php
/**
 * StarRating::module_styles()
 *
 * @package INFTNC\Modules\StarRating
 * @since ??
 */

namespace INFTNC\Modules\StarRating\StarRatingTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * StarRating module styles callback.
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
		$order_class                 = $args['orderClass'] ?? '';
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

		$data      = $attrs['starRatingData']['innerContent']['desktop']['value'] ?? [];
		$gap       = intval( $data['gap'] ?? 0 );
		$alignment = $data['star_alignment'] ?? 'left';

		$alignment_map = [
			'left'   => 'flex-start',
			'center' => 'center',
			'right'  => 'flex-end',
		];
		$justify_css = 'justify-content: ' . ( $alignment_map[ $alignment ] ?? 'flex-start' ) . ';';

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

					// Title heading font styles.
					$elements->style(
						[
							'attrName' => 'titleText',
						]
					),

					// Rating number font styles.
					$elements->style(
						[
							'attrName' => 'ratingNumber',
						]
					),

					// Star gap CSS.
					CssStyle::style(
						[
							'selector' => "{$order_class} .jq-star",
							'attr'     => [
								'desktop' => [
									'value' => [
										'mainElement' => $gap > 0 ? "margin-left: {$gap}px !important;" : '',
									],
								],
							],
						]
					),

					// Reset first star gap.
					CssStyle::style(
						[
							'selector' => "{$order_class} .jq-star:first-child",
							'attr'     => [
								'desktop' => [
									'value' => [
										'mainElement' => $gap > 0 ? 'margin-left: 0 !important;' : '',
									],
								],
							],
						]
					),

					// Star alignment CSS.
					CssStyle::style(
						[
							'selector' => "{$order_class} .inftnc_rating_inner_wrapper",
							'attr'     => [
								'desktop' => [
									'value' => [
										'mainElement' => $justify_css,
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
