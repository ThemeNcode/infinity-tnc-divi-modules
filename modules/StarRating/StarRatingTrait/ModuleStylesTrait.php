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
use ET\Builder\Packages\Module\Layout\Components\StyleCommon\CommonStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * Generate CSS declaration for star gap.
	 *
	 * @since ??
	 *
	 * @param array $args Style declaration arguments.
	 *
	 * @return string
	 */
	public static function gap_style_declaration( $args ): string {
		$value = $args['attrValue']['innerContent']['desktop']['value']
			?? $args['attr']['innerContent']['desktop']['value']
			?? [];

		$gap = intval( $value['gap'] ?? 0 );

		if ( $gap <= 0 ) {
			return '';
		}

		return "margin-left: {$gap}px !important;";
	}

	/**
	 * Generate CSS declaration for star alignment.
	 *
	 * @since ??
	 *
	 * @param array $args Style declaration arguments.
	 *
	 * @return string
	 */
	public static function alignment_style_declaration( $args ): string {
		$value = $args['attrValue']['innerContent']['desktop']['value']
			?? $args['attr']['innerContent']['desktop']['value']
			?? [];

		$alignment_map = [
			'left'   => 'flex-start',
			'center' => 'center',
			'right'  => 'flex-end',
		];

		$alignment = $value['star_alignment'] ?? 'left';

		return 'justify-content: ' . ( $alignment_map[ $alignment ] ?? 'flex-start' ) . ';';
	}

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
		$default_printed_style_attrs = $args['defaultPrintedStyleAttrs'] ?? [];

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

					// Rating number font styles.
					$elements->style(
						[
							'attrName' => 'ratingNumber',
						]
					),

					// Star gap CSS.
					CommonStyle::style(
						[
							'selector'            => "{$args['orderClass']} .jq-star",
							'attr'                => $attrs['starRatingData'] ?? [],
							'declarationFunction' => [ self::class, 'gap_style_declaration' ],
						]
					),

					// Star alignment CSS.
					CommonStyle::style(
						[
							'selector'            => "{$args['orderClass']} .inftnc_rating_inner_wrapper",
							'attr'                => $attrs['starRatingData'] ?? [],
							'declarationFunction' => [ self::class, 'alignment_style_declaration' ],
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
