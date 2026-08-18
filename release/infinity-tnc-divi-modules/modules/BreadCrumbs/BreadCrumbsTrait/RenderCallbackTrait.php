<?php
/**
 * BreadCrumbs::render_callback()
 *
 * @package INFTNC\Modules\BreadCrumbs
 * @since ??
 */

namespace INFTNC\Modules\BreadCrumbs\BreadCrumbsTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\IconLibrary\IconFont\Utils;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * Resolve a D5 icon attribute value to a renderable character.
	 *
	 * D5 stores icon-picker values as arrays: ['unicode' => '...', 'type' => 'divi', 'weight' => '400'].
	 * D4-migrated data may still be a plain string like '&#x35;||divi'.
	 *
	 * @param array|string $icon_value The raw icon attribute value.
	 * @param string       $fallback   Fallback HTML entity string.
	 *
	 * @return string The renderable icon character.
	 */
	private static function resolve_icon_char( $icon_value, string $fallback = '&#x35;' ): string {
		if ( is_array( $icon_value ) && isset( $icon_value['unicode'] ) ) {
			$char = Utils::process_font_icon( $icon_value );
			return $char ?? $fallback;
		}

		// Legacy D4 string format: '&#x35;||divi'
		if ( is_string( $icon_value ) && ! empty( $icon_value ) ) {
			$parts = explode( '||', $icon_value );
			$char  = $parts[0];

			// The legacy segment must be a single icon glyph or HTML entity — never
			// arbitrary markup. Anything else falls back to the safe default so the
			// value cannot break out of the separator/icon span (stored XSS).
			return preg_match( '/^(&#x?[0-9a-fA-F]+;|&[a-zA-Z][a-zA-Z0-9]*;|[^\s<>"\'&])$/u', $char )
				? $char
				: $fallback;
		}

		return $fallback;
	}

	/**
	 * BreadCrumbs module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of BreadCrumbs module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		$bread_crumbs_data = $attrs['breadCrumbsData']['innerContent']['desktop']['value'] ?? [];
		$home_text         = $bread_crumbs_data['home_text'] ?? 'Home';
		$before_text       = $bread_crumbs_data['before_text'] ?? '';
		$use_before_icon   = $bread_crumbs_data['use_before_icon'] ?? 'off';

		$separator_char = self::resolve_icon_char( $bread_crumbs_data['seperator_icon'] ?? '&#x35;||divi', '&#x35;' );
		$before_icon_char = 'on' === $use_before_icon
			? self::resolve_icon_char( $bread_crumbs_data['before_text_icon'] ?? '&#x35;||divi', '&#x35;' )
			: '';

		// Build breadcrumb output — infinity_tnc_breadcrumb wraps $separator_char in .inftnc_separator.et-pb-icon.
		$breadcrumb_html = '';
		if ( function_exists( 'infinity_tnc_breadcrumb' ) ) {
			$breadcrumb_html = infinity_tnc_breadcrumb( $home_text, $before_text, $separator_char );
		}

		// Prepend before-icon if enabled.
		if ( ! empty( $before_icon_char ) ) {
			$icon_prefix     = HTMLUtility::render(
				[
					'tag'               => 'span',
					'attributes'        => [
						'class' => 'inftnc_before_icon et-pb-icon',
					],
					'childrenSanitizer' => 'esc_html',
					'children'          => $before_icon_char,
				]
			);
			$breadcrumb_html = $icon_prefix . $breadcrumb_html;
		}

		$inner_content = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_bread_crumbs_container',
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $breadcrumb_html,
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
				'children'            => $inner_content,
			]
		);
	}
}
