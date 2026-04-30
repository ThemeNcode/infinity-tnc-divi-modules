<?php
/**
 * DualButton::render_callback()
 *
 * @package INFTNC\Modules\DualButton
 * @since ??
 */

namespace INFTNC\Modules\DualButton\DualButtonTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\IconLibrary\IconFont\Utils;

trait RenderCallbackTrait {

	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * Build data-icon-* attribute map from a button decoration array.
	 * Matches the D5 button module pattern.
	 *
	 * @param array $button_decoration Button decoration attribute (breakpoint-keyed).
	 *
	 * @return array
	 */
	protected static function build_icon_data_attrs( array $button_decoration ): array {
		$desktop_value     = $button_decoration['desktop']['value'] ?? [];
		$has_custom_button = 'on' === ( $desktop_value['enable'] ?? 'off' );
		$is_icon_enabled   = 'on' === ( $desktop_value['icon']['enable'] ?? 'off' );

		if ( ! $has_custom_button || ! $is_icon_enabled ) {
			return [];
		}

		$breakpoint_to_data_attr = static function ( $breakpoint ) {
			if ( 'desktop' === $breakpoint ) {
				return 'data-icon';
			}
			return 'data-icon-' . strtolower( preg_replace( '/([A-Z])/', '-$1', $breakpoint ) );
		};

		$icon_data_attrs = [];
		foreach ( $button_decoration as $breakpoint => $breakpoint_value ) {
			$icon_settings = $breakpoint_value['value']['icon']['settings'] ?? null;
			if ( ! empty( $icon_settings ) ) {
				$processed_icon                            = Utils::process_font_icon( $icon_settings );
				$icon_data_attrs[ $breakpoint_to_data_attr( $breakpoint ) ] = $processed_icon;
			}
		}

		return $icon_data_attrs;
	}

	public static function render_callback( $attrs, $content, $block, $elements ): string {
		$data      = $attrs['dualButtonData']['innerContent']['desktop']['value'] ?? [];
		$alignment = $data['button_alignment'] ?? 'left';
		$gap       = $data['button_gap']       ?? '10px';

		// Left button content.
		$left_content = $attrs['buttonLeft']['innerContent']['desktop']['value'] ?? [];
		$left_text    = esc_html( $left_content['text']    ?? 'Left Button' );
		$left_url     = esc_url( $left_content['linkUrl']  ?? '#' );
		$left_target  = 'on' === ( $left_content['linkTarget'] ?? 'off' ) ? '_blank' : '';

		// Right button content.
		$right_content = $attrs['buttonRight']['innerContent']['desktop']['value'] ?? [];
		$right_text    = esc_html( $right_content['text']    ?? 'Right Button' );
		$right_url     = esc_url( $right_content['linkUrl']  ?? '#' );
		$right_target  = 'on' === ( $right_content['linkTarget'] ?? 'off' ) ? '_blank' : '';

		// Icon data-* attributes (D5 button pattern).
		$left_icon_attrs  = self::build_icon_data_attrs( $attrs['buttonLeft']['decoration']['button']  ?? [] );
		$right_icon_attrs = self::build_icon_data_attrs( $attrs['buttonRight']['decoration']['button'] ?? [] );

		// Style components (renders button decoration inline CSS including icon content).
		$left_style_components  = $elements->style_components( [ 'attrName' => 'buttonLeft' ] );
		$right_style_components = $elements->style_components( [ 'attrName' => 'buttonRight' ] );

		$left_btn_attrs = array_merge(
			[
				'class' => 'et_pb_button inftnc_pb_button_left et_pb_bg_layout_light',
				'href'  => $left_url,
			],
			$left_icon_attrs
		);
		if ( ! empty( $left_target ) ) {
			$left_btn_attrs['target'] = $left_target;
			$left_btn_attrs['rel']    = 'noopener noreferrer';
		}

		$right_btn_attrs = array_merge(
			[
				'class' => 'et_pb_button inftnc_pb_button_right et_pb_bg_layout_light',
				'href'  => $right_url,
			],
			$right_icon_attrs
		);
		if ( ! empty( $right_target ) ) {
			$right_btn_attrs['target'] = $right_target;
			$right_btn_attrs['rel']    = 'noopener noreferrer';
		}

		$left_btn = HTMLUtility::render(
			[
				'tag'               => 'a',
				'attributes'        => $left_btn_attrs,
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $left_style_components . $left_text,
			]
		);

		$right_btn = HTMLUtility::render(
			[
				'tag'               => 'a',
				'attributes'        => $right_btn_attrs,
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $right_style_components . $right_text,
			]
		);

		$wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_button_wrapper et_pb_button_module_wrapper',
					'style' => esc_attr( "display:flex;flex-wrap:wrap;justify-content:{$alignment};gap:{$gap};" ),
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $left_btn . $right_btn,
			]
		);

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
				'classnamesFunction'  => [ self::class, 'module_classnames' ],
				'stylesComponent'     => [ self::class, 'module_styles' ],
				'scriptDataComponent' => [ self::class, 'module_script_data' ],
				'parentAttrs'         => $parent_attrs,
				'parentId'            => $parent->id ?? '',
				'parentName'          => $parent->blockName ?? '',
				'children'            => $wrapper,
			]
		);
	}
}
