<?php
/**
 * HeadingGradient::render_callback()
 *
 * @package INFTNC\Modules\HeadingGradient
 * @since ??
 */

namespace INFTNC\Modules\HeadingGradient\HeadingGradientTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;

trait RenderCallbackTrait {

	/**
	 * Heading Gradient module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of Heading Gradient module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		$data         = $attrs['headingGradientData']['innerContent']['desktop']['value'] ?? [];
		$title        = $attrs['title']['innerContent']['desktop']['value'] ?? 'My Awesome Heading with Gradient';
		$header_level = $attrs['title']['decoration']['font']['font']['desktop']['value']['headingLevel'] ?? 'h1';

		$heading = \ET\Builder\Framework\Utility\HTMLUtility::render(
			[
				'tag'               => et_pb_process_header_level( $header_level, 'h1' ),
				'attributes'        => [
					'class' => 'inftnc_gradient_title et_pb_module_header',
				],
				'childrenSanitizer' => 'esc_html',
				'children'          => $title,
			]
		);

		$gradient_options  = $data['gradient_options'] ?? 'gradient_custom_color';
		$gradient_type     = $data['gradient_type'] ?? 'linear_gradient';
		$linear_position   = $data['linear_position'] ?? 'right';
		$radial_position   = $data['radial_position'] ?? 'center center';
		$ellipse_position  = $data['ellipse_position'] ?? 'center center';
		$start_color       = sanitize_hex_color( $data['start_color'] ?? '#481CA6' ) ?? '#481CA6';
		$end_color         = sanitize_hex_color( $data['end_color'] ?? '#AC43D9' ) ?? '#AC43D9';
		$start_position    = absint( $data['start_position'] ?? 0 );
		$end_position      = absint( $data['end_position'] ?? 100 );
		$presets_gradient  = $data['presets_gradient'] ?? 'gradient_preset1';

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

		// Only allow positions from the allowlist; fall back to a safe default rather than
		// the raw attribute value so unsanitized data cannot enter the CSS string.
		$linearPosCSS  = $position_map[$linear_position] ?? 'right';
		$radialPosCSS  = $position_map[$radial_position] ?? 'center center';
		$ellipsePosCSS = $position_map[$ellipse_position] ?? 'center center';

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

		$gradientCss = '';
		if ( ! empty( $gradientDeclaration ) ) {
			$orderClass   = ".inftnc_heading_gradient_container_" . $block->parsed_block['orderIndex'];
			$headingTags  = implode( ', ', array_map( fn( $n ) => "{$orderClass} h{$n}.inftnc_gradient_title", range( 1, 6 ) ) );
			$gradientCss  = "<style>
				{$headingTags} {
					background: {$gradientDeclaration}
					-webkit-background-clip: text !important;
					-webkit-text-fill-color: transparent !important;
				}
			</style>";
		}

		$parent       = BlockParserStore::get_parent( $block->parsed_block['id'], $block->parsed_block['storeInstance'] );
		$parent_attrs = $parent->attrs ?? [];

		return Module::render(
			[
				// FE only.
				'orderIndex'          => $block->parsed_block['orderIndex'],
				'storeInstance'       => $block->parsed_block['storeInstance'],

				// VB equivalent.
				'id'                  => $block->parsed_block['id'],
				'name'                => $block->block_type->name,
				'moduleCategory'      => $block->block_type->category,
				'attrs'               => $attrs,
				'elements'            => $elements,
				'parentAttrs'         => $parent_attrs,
				'parentId'            => $parent->id ?? '',
				'parentName'          => $parent->blockName ?? '',
				'stylesComponent'     => [ self::class, 'module_styles' ],
				'scriptDataComponent' => [ self::class, 'module_script_data' ],
				'children'            => $heading . $gradientCss,
			]
		);
	}
}
