<?php
/**
 * ImageCarousel::render_callback().
 *
 * @package INFTNC\Modules\ImageCarousel
 * @since ??
 */

namespace INFTNC\Modules\ImageCarousel\ImageCarouselTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use INFTNC\Modules\ImageCarousel\ImageCarousel;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * ImageCarousel module render callback.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes saved by VB.
	 * @param string         $content  Block content (rendered children).
	 * @param \WP_Block      $block    Parsed block object.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered output.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ): string {
		wp_enqueue_style( 'inftnc-image-carousel' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_script( 'inftnc-slick' );

		$data = $attrs['imageCarouselData']['innerContent']['desktop']['value'] ?? [];

		$slide_spacing    = $data['slide_spacing'] ?? '20px';
		$slides_to_show   = $data['slides_to_show'] ?? '3';
		$slides_to_scroll = $data['slides_to_scroll'] ?? '1';
		$animation_speed  = $data['animation_speed'] ?? '300';
		$autoplay_speed   = $data['autoplay_speed'] ?? '3000';
		$rtl_raw          = $data['rtl'] ?? 'off';

		$autoplay       = ( 'on' === ( $data['autoplay'] ?? 'on' ) ) ? 'true' : 'false';
		$use_navigation = ( 'on' === ( $data['use_navigation'] ?? 'on' ) ) ? 'true' : 'false';
		$use_pagination = ( 'on' === ( $data['use_pagination'] ?? 'on' ) ) ? 'true' : 'false';
		$infinite       = ( 'on' === ( $data['infinite'] ?? 'on' ) ) ? 'true' : 'false';
		$pause_on_hover = ( 'on' === ( $data['pause_on_hover'] ?? 'on' ) ) ? 'true' : 'false';
		$swipe          = ( 'on' === ( $data['swipe'] ?? 'on' ) ) ? 'true' : 'false';
		$rtl            = ( 'on' === $rtl_raw ) ? 'true' : 'false';
		$dir            = ( 'on' === $rtl_raw ) ? 'rtl' : '';

		$children_ids = isset( $block->parsed_block['innerBlocks'] ) ? array_map(
			function( $inner_block ) {
				return $inner_block['id'];
			},
			$block->parsed_block['innerBlocks']
		) : [];

		$carousel_wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => array_filter( [
					'dir'                  => $dir,
					'class'                => 'inftnc_carousels_image_wrapper',
					'style'                => $slide_spacing ? "--inftnc-slide-gap:{$slide_spacing};" : null,
					'data-slides-to-show'  => esc_attr( $slides_to_show ),
					'data-slide-scroll'    => esc_attr( $slides_to_scroll ),
					'data-animation-speed' => esc_attr( $animation_speed ),
					'data-autoplay'        => esc_attr( $autoplay ),
					'data-autoplay-speed'  => esc_attr( $autoplay_speed ),
					'data-navigation'      => esc_attr( $use_navigation ),
					'data-pagination'      => esc_attr( $use_pagination ),
					'data-infinite'        => esc_attr( $infinite ),
					'data-pause-hover'     => esc_attr( $pause_on_hover ),
					'data-swipe'           => esc_attr( $swipe ),
					'data-rtl'             => esc_attr( $rtl ),
				] ),
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
				'classnamesFunction'  => [ ImageCarousel::class, 'module_classnames' ],
				'stylesComponent'     => [ ImageCarousel::class, 'module_styles' ],
				'scriptDataComponent' => [ ImageCarousel::class, 'module_script_data' ],
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
				) . $carousel_wrapper,
				'childrenIds'         => $children_ids,
			]
		);
	}
}
