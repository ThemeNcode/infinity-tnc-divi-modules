<?php
/**
 * ImageCarouselChild::render_callback().
 *
 * @package INFTNC\Modules\ImageCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\ImageCarouselChild\ImageCarouselChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use ET\Builder\Packages\ModuleUtils\ModuleUtils;
use INFTNC\Modules\ImageCarouselChild\ImageCarouselChild;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * ImageCarouselChild module render callback.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered output.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ): string {
		$parent       = BlockParserStore::get_parent( $block->parsed_block['id'], $block->parsed_block['storeInstance'] );
		$parent_attrs = ModuleUtils::get_all_attrs( $parent );

		$data  = $attrs['imageCarouselChildData']['innerContent']['desktop']['value'] ?? [];
		$image = $data['image'] ?? '';
		$alt   = $data['alt'] ?? '';

		$default_image = defined( 'ET_BUILDER_PLACEHOLDER_LANDSCAPE_IMAGE_DATA' ) ? ET_BUILDER_PLACEHOLDER_LANDSCAPE_IMAGE_DATA : '';

		// esc_attr instead of esc_url: the saved value may be a data: URI (from placeholderContent)
		// which esc_url() strips. esc_attr() HTML-encodes safely without protocol validation.
		$img_html = sprintf(
			'<img class="image_carousel_img" src="%s" alt="%s">',
			esc_attr( $image ?: $default_image ),
			esc_attr( $alt )
		);

		$slide_html = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_carousel_child',
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $img_html,
			]
		);

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
				'classnamesFunction'  => [ ImageCarouselChild::class, 'module_classnames' ],
				'stylesComponent'     => [ ImageCarouselChild::class, 'module_styles' ],
				'scriptDataComponent' => [ ImageCarouselChild::class, 'module_script_data' ],
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
				) . $slide_html,
			]
		);
	}
}
