<?php
/**
 * LogoCarouselChild::render_callback().
 *
 * @package INFTNC\Modules\LogoCarouselChild
 * @since ??
 */

namespace INFTNC\Modules\LogoCarouselChild\LogoCarouselChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use ET\Builder\Packages\ModuleUtils\ModuleUtils;
use INFTNC\Modules\LogoCarouselChild\LogoCarouselChild;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * LogoCarouselChild module render callback.
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

		$data = $attrs['logoCarouselChildData']['innerContent']['desktop']['value'] ?? [];
		$logo = $data['logo'] ?? '';
		$alt  = $data['alt'] ?? '';

		// The divi/upload field stores its value as a plain URL string, but the media
		// library returns an object ( e.g. [ 'url' => ... ] ) when an image is inserted.
		// Normalize to a URL string so it is not cast to "Array" by esc_attr().
		if ( is_array( $logo ) ) {
			$logo = $logo['url'] ?? ( $logo['src'] ?? '' );
		}

		$default_image = defined( 'ET_BUILDER_PLACEHOLDER_LANDSCAPE_IMAGE_DATA' ) ? ET_BUILDER_PLACEHOLDER_LANDSCAPE_IMAGE_DATA : '';

		$src = $logo ?: $default_image;

		// Real uploaded images are http(s) URLs and are escaped with esc_url(). The
		// placeholder is a data: URI, which esc_url() would strip, so fall back to
		// esc_attr() only for data: URIs.
		$src_escaped = ( 0 === strpos( (string) $src, 'data:' ) ) ? esc_attr( $src ) : esc_url( $src );

		$img_html = sprintf(
			'<img class="logo_carousel_img" src="%s" alt="%s">',
			$src_escaped,
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
				'classnamesFunction'  => [ LogoCarouselChild::class, 'module_classnames' ],
				'stylesComponent'     => [ LogoCarouselChild::class, 'module_styles' ],
				'scriptDataComponent' => [ LogoCarouselChild::class, 'module_script_data' ],
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
