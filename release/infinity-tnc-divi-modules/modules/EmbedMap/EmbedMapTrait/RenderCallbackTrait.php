<?php
/**
 * EmbedMap::render_callback()
 *
 * @package INFTNC\Modules\EmbedMap
 * @since ??
 */

namespace INFTNC\Modules\EmbedMap\EmbedMapTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use INFTNC\Modules\Sanitizer\EmbedKses;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * Embed Map module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of Embed Map module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		// Get attribute values from the consolidated sourceData array.
		$source_data        = $attrs['sourceData']['innerContent']['desktop']['value'] ?? [];
		$source_type        = $source_data['sourceType'] ?? 'latitude_longitude';
		$latitude_longitude = $source_data['latitudeLongitude'] ?? '40.658620799731196,-73.99475680760217';
		$map_zoom           = $source_data['mapZoom'] ?? '14';
		$embed_code         = $source_data['embedCode'] ?? '';

		// Build map output based on source type.
		if ( 'embed_code' === $source_type && ! empty( $embed_code ) ) {
			// Sanitize raw embed markup with KSES (post allowlist + a tight iframe
			// rule), matching the Divi 4 module's KSES approach. This strips <script>
			// and other dangerous markup while keeping the map iframe intact.
			$map = EmbedKses::sanitize( $embed_code );
		} else {
			$map = sprintf(
				'<iframe src="https://maps.google.com/maps?q=%1$s&z=%2$s&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
				esc_attr( $latitude_longitude ),
				esc_attr( $map_zoom )
			);
		}

		$inner_content = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_embed_map',
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $map,
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
