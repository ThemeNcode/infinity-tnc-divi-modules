<?php
/**
 * StarRating::render_callback()
 *
 * @package INFTNC\Modules\StarRating
 * @since ??
 */

namespace INFTNC\Modules\StarRating\StarRatingTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * StarRating module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of StarRating module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		$data = $attrs['starRatingData']['innerContent']['desktop']['value'] ?? [];

		$title              = $data['title']              ?? '';
		$count_star         = $data['count_star']         ?? '5';
		$rating             = $data['rating']             ?? '5';
		$show_rating_number = $data['show_rating_number'] ?? 'off';
		$icon_color         = $data['icon_color']         ?? '#EBC03F';
		$empty_color        = $data['empty_color']        ?? '#AAAAAA';
		$star_size          = $data['star_size']          ?? '25';
		$star_alignment     = $data['star_alignment']     ?? 'left';
		$header_level       = $attrs['module']['advanced']['header']['title']['header_level']['desktop']['value'] ?? 'h1';

		wp_enqueue_script( 'inftnc-rating-module' );

		// Title heading.
		$title_html = '';
		if ( ! empty( $title ) ) {
			$title_html = HTMLUtility::render(
				[
					'tag'               => et_pb_process_header_level( $header_level, 'h1' ),
					'attributes'        => [ 'class' => 'inftnc_rating_title' ],
					'childrenSanitizer' => 'esc_html',
					'children'          => $title,
				]
			);
			$title_html = HTMLUtility::render(
				[
					'tag'               => 'div',
					'attributes'        => [ 'class' => 'inftnc_rating_title-wrap' ],
					'childrenSanitizer' => 'et_core_esc_previously',
					'children'          => $title_html,
				]
			);
		}

		// Rating number span.
		$rating_number_html = '';
		if ( 'on' === $show_rating_number ) {
			$number_span = HTMLUtility::render(
				[
					'tag'               => 'span',
					'attributes'        => [ 'class' => 'inftnc_star_rating_number' ],
					'childrenSanitizer' => 'esc_html',
					'children'          => sprintf( '(%s / %s)', esc_html( $rating ), esc_html( $count_star ) ),
				]
			);
			$rating_number_html = HTMLUtility::render(
				[
					'tag'               => 'div',
					'attributes'        => [ 'class' => 'inftnc_rating_number_wrapper' ],
					'childrenSanitizer' => 'et_core_esc_previously',
					'children'          => $number_span,
				]
			);
		}

		// Star rating widget div (initialized by jQuery plugin on frontend).
		$star_div = HTMLUtility::render(
			[
				'tag'        => 'div',
				'attributes' => [
					'class'                => 'intftnc-rating',
					'data-initial-rating'  => esc_attr( $rating ),
					'data-initial-start'   => esc_attr( $count_star ),
					'data-initial-empty'   => esc_attr( $empty_color ),
					'data-initial-active'  => esc_attr( $icon_color ),
					'data-initial-size'    => esc_attr( $star_size ),
				],
				'children'   => '',
			]
		);

		$inner_wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_rating_inner_wrapper inftnc_rating_star_alignment_' . esc_attr( $star_alignment ),
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $star_div . $rating_number_html,
			]
		);

		$start_inner = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [ 'class' => 'start_rating_inner' ],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $title_html . $inner_wrapper,
			]
		);

		$wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [ 'class' => 'inftnc_star_rating_wrapper' ],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $start_inner,
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
