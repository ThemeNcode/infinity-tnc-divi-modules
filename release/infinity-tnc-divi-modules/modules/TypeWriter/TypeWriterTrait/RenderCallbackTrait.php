<?php
/**
 * TypeWriter::render_callback()
 *
 * @package INFTNC\Modules\TypeWriter
 * @since ??
 */

namespace INFTNC\Modules\TypeWriter\TypeWriterTrait;

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
	 * TypeWriter module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of TypeWriter module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		$data = $attrs['typewriterData']['innerContent']['desktop']['value'] ?? [];

		$before_text      = $data['before_text']      ?? 'I am a Heading with';
		$typing_text      = $data['typing_text']       ?? 'Typewriter|Typing Animation';
		$after_text       = $data['after_text']        ?? 'Effect';
		$typing_speed     = $data['typing_speed']      ?? '75';
		$typing_backspeed = $data['typing_backspeed']  ?? '75';
		$pause_for        = $data['pause_for']         ?? '1500';
		$typing_cursor    = $data['typing_cursor']     ?? '|';
		$typing_loop      = $data['typing_loop']       ?? 'on';
		$header_level     = $attrs['module']['advanced']['header']['title']['header_level']['desktop']['value'] ?? 'h1';

		wp_enqueue_script( 'inftnc-typewriter-module' );

		$loop_value = ( 'on' === $typing_loop ) ? 'true' : 'false';

		$typewriter_span = HTMLUtility::render(
			[
				'tag'        => 'span',
				'attributes' => [
					'class'                => 'inftnc_typewriter_text',
					'data-initial-text'    => esc_attr( $typing_text ),
					'data-initial-speed'   => esc_attr( $typing_speed ),
					'data-initial-backspeed' => esc_attr( $typing_backspeed ),
					'data-initial-pause'   => esc_attr( $pause_for ),
					'data-initial-cursor'  => esc_attr( $typing_cursor ),
					'data-initial-loop'    => $loop_value,
				],
				'children'   => '',
			]
		);

		$before_span = ! empty( $before_text ) ? HTMLUtility::render(
			[
				'tag'               => 'span',
				'attributes'        => [ 'class' => 'inftnc_before_text' ],
				'childrenSanitizer' => 'esc_html',
				'children'          => $before_text,
			]
		) : '';

		$after_span = ! empty( $after_text ) ? HTMLUtility::render(
			[
				'tag'               => 'span',
				'attributes'        => [ 'class' => 'inftnc_after_text' ],
				'childrenSanitizer' => 'esc_html',
				'children'          => $after_text,
			]
		) : '';

		$heading = HTMLUtility::render(
			[
				'tag'               => et_pb_process_header_level( $header_level, 'h1' ),
				'attributes'        => [ 'class' => 'inftnc_typewriter_main_title' ],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $before_span . $typewriter_span . $after_span,
			]
		);

		$wrapper = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [ 'class' => 'inftnc_typewriter_wrapper' ],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $heading,
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
