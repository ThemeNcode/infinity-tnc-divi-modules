<?php
/**
 * SocialShare::render_callback().
 *
 * @package INFTNC\Modules\SocialShare
 * @since ??
 */

namespace INFTNC\Modules\SocialShare\SocialShareTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use INFTNC\Modules\SocialShare\SocialShare;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * SocialShare module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content (rendered children).
	 * @param \WP_Block      $block    Parsed block object.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered output.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ): string {
		wp_enqueue_script( 'inftnc-social-share' );
		
		$inner_content = $attrs['socialShareData']['innerContent']['desktop']['value'] ?? [];
		$children_ids = $block->parsed_block['innerBlocks']
			? array_column( $block->parsed_block['innerBlocks'], 'id' )
			: [];

		$wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_social_share_wrapper',
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $content,
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
				'classnamesFunction'  => [ SocialShare::class, 'module_classnames' ],
				'stylesComponent'     => [ SocialShare::class, 'module_styles' ],
				'scriptDataComponent' => [ SocialShare::class, 'module_script_data' ],
				'parentAttrs'         => $parent_attrs,
				'parentId'            => $parent->id ?? '',
				'parentName'          => $parent->blockName ?? '',
				'children'            => ElementComponents::component(
					[
						'attrs'         => $attrs['module']['decoration'] ?? [],
						'id'            => $block->parsed_block['id'],
						'orderIndex'    => $block->parsed_block['orderIndex'],
						'storeInstance' => $block->parsed_block['storeInstance'],
					]
				) . $wrapper,
				'childrenIds'         => $children_ids,
			]
		);
	}
}
