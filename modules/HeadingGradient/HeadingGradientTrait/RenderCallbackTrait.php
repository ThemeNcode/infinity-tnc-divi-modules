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
		$title        = $data['gradient_title'] ?? 'My Awesome Heading with Gradient';
		$header_level = $attrs['module']['advanced']['header']['title']['header_level']['desktop']['value'] ?? 'h1';

		$heading = HTMLUtility::render(
			[
				'tag'               => et_pb_process_header_level( $header_level, 'h1' ),
				'attributes'        => [
					'class' => 'inftnc_gradient_title et_pb_module_header',
				],
				'childrenSanitizer' => 'esc_html',
				'children'          => $title,
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
				'parentAttrs'         => $parent_attrs,
				'parentId'            => $parent->id ?? '',
				'parentName'          => $parent->blockName ?? '',
				'stylesComponent'     => [ self::class, 'module_styles' ],
				'scriptDataComponent' => [ self::class, 'module_script_data' ],
				'children'            => $heading,
			]
		);
	}
}
