<?php
/**
 * HeadingGradient::module_styles()
 *
 * @package INFTNC\Modules\HeadingGradient
 * @since ??
 */

namespace INFTNC\Modules\HeadingGradient\HeadingGradientTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\FrontEnd\Module\Style;
use ET\Builder\Packages\Module\Options\Css\CssStyle;
use ET\Builder\Packages\Module\Layout\Components\StyleCommon\CommonStyle;

trait ModuleStylesTrait {

	use CustomCssTrait;

	/**
	 * Custom gradient style declarations.
	 */
	public static function custom_gradient_style_declaration( $args ) {
		$attr_value = $args['attrValue']['innerContent']['desktop']['value'] ?? $args['attr']['innerContent']['desktop']['value'] ?? [];
		if ( empty( $attr_value ) ) {
			// Try accessing keys directly if attrValue was flattened
			$attr_value = $args['attrValue'] ?? $args['attr'] ?? [];
		}

		$gradient_options  = $attr_value['gradient_options'] ?? 'gradient_custom_color';
		$gradient_type     = $attr_value['gradient_type'] ?? 'linear_gradient';
		$linear_position   = $attr_value['linear_position'] ?? 'right';
		$radial_position   = $attr_value['radial_position'] ?? 'center center';
		$ellipse_position  = $attr_value['ellipse_position'] ?? 'center center';
		$start_color       = $attr_value['start_color'] ?? '#481CA6';
		$end_color         = $attr_value['end_color'] ?? '#AC43D9';
		$start_position    = $attr_value['start_position'] ?? 0;
		$end_position      = $attr_value['end_position'] ?? 100;
		$presets_gradient  = $attr_value['presets_gradient'] ?? 'gradient_preset1';

		$position_map = [
			'top_left'      => 'top left',
			'top'           => 'top',
			'top_right'     => 'top right',
			'right'         => 'right',
			'bottom_right'  => 'bottom right',
			'bottom'        => 'bottom',
			'bottom_left'   => 'bottom left',
			'left'          => 'left',
			'top_center'    => 'top center',
			'left_center'   => 'left center',
			'center_center' => 'center center',
			'right_center'  => 'right center',
			'bottom_center' => 'bottom center',
		];

		$linearPosCSS  = $position_map[$linear_position] ?? $linear_position;
		$radialPosCSS  = $position_map[$radial_position] ?? $radial_position;
		$ellipsePosCSS = $position_map[$ellipse_position] ?? $ellipse_position;

		$gradientDeclaration = '';

		if ( 'gradient_custom_color' === $gradient_options ) {
			if ( 'linear_gradient' === $gradient_type ) {
				$gradientDeclaration = "-webkit-linear-gradient({$linearPosCSS}, {$start_color} {$start_position}%, {$end_color} {$end_position}%) !important;";
			} else if ( 'radial_gradient' === $gradient_type ) {
				$gradientDeclaration = "radial-gradient(circle farthest-corner at {$radialPosCSS}, {$start_color} {$start_position}%, {$end_color} {$end_position}%) !important;";
			} else if ( 'ellipse' === $gradient_type ) {
				$gradientDeclaration = "radial-gradient(ellipse farthest-corner at {$ellipsePosCSS}, {$start_color} {$start_position}%, {$end_color} {$end_position}%) !important;";
			}
		} else if ( 'gradient_preset_color' === $gradient_options ) {
			$presets = [
				'gradient_preset1' => 'linear-gradient(to right, #03658C 0%, #63BBF2 100%) !important;',
				'gradient_preset2' => 'linear-gradient(to right, #F1543F 0%, #FDC362 100%) !important;',
				'gradient_preset3' => 'linear-gradient(to bottom right, #30303B 0%, #EAE9E7 100%) !important;',
				'gradient_preset4' => 'linear-gradient(to right, #8C5B49 0%, #D9BBA0 100%) !important;',
				'gradient_preset5' => 'linear-gradient(to right, #044D29 0%, #97ED8A 100%) !important;',
				'gradient_preset6' => 'linear-gradient(to right, #481CA6 0%, #AC43D9 100%) !important;',
			];
			$gradientDeclaration = $presets[$presets_gradient] ?? $presets['gradient_preset1'];
		}

		if ( empty( $gradientDeclaration ) ) {
			return '';
		}

		return "
			background: {$gradientDeclaration}
			-webkit-background-clip: text !important;
			-webkit-text-fill-color: transparent !important;
		";
	}

	/**
	 * heading Embed module's style components.
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
					// Module
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

					// Title Attribute
					$elements->style(
						[
							'attrName'   => 'title',
						]
					),

					// Gradient Custom Style
					CommonStyle::style(
						[
							'selector'            => "{$args['orderClass']} .inftnc_gradient_title",
							'attr'                => $attrs['headingGradientData'] ?? [],
							'declarationFunction' => [ self::class, 'custom_gradient_style_declaration' ],
						]
					),

					// Custom CSS
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

