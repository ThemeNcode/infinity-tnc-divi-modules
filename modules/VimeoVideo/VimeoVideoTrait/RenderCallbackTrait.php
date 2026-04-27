<?php
/**
 * VimeoVideo::render_callback()
 *
 * @package INFTNC\Modules\VimeoVideo
 * @since ??
 */

namespace INFTNC\Modules\VimeoVideo\VimeoVideoTrait;

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
	 * Vimeo Video module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of Vimeo Video module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		// Get attribute values from the consolidated vimeoVideoData array.
		$vimeo_data         = $attrs['vimeoVideoData']['mainContent']['desktop']['value'] ?? [];
		$vimeo_method       = $vimeo_data['vimeo_method'] ?? 'vimeo_url';
		$vimeo_url          = $vimeo_data['vimeo_url'] ?? 'https://vimeo.com/915873558';
		$vimeo_id           = $vimeo_data['vimeo_id'] ?? '';
		$vimeo_embed        = $vimeo_data['vimeo_embed'] ?? '';
		$vimeo_start        = $vimeo_data['vimeo_start'] ?? '';
		$vimeo_autoplay     = $vimeo_data['autoplay'] ?? 'on';
		$vimeo_mute         = $vimeo_data['mute'] ?? 'on';
		$vimeo_loop         = $vimeo_data['loop'] ?? 'off';
		$vimeo_control      = $vimeo_data['player_control'] ?? 'off';
		$vimeo_portait      = $vimeo_data['intro_portait'] ?? 'off';
		$vimeo_title        = $vimeo_data['intro_title'] ?? 'off';
		$vimeo_byline       = $vimeo_data['intro_byline'] ?? 'off';
		$vimeo_playsinline  = $vimeo_data['playsinline'] ?? 'off';
		$vimeo_color 		= $vimeo_data['vimeo_color'] ?? '00adef';

        $autoplay_value = ( 'on' === $vimeo_autoplay ) ? 1 : 0;
        $mute_value = ( 'on' === $vimeo_mute ) ? 1 : 0;
        $loop_value = ( 'on' === $vimeo_loop ) ? 1 : 0;
        $control_value = ( 'on' === $vimeo_control ) ? 1 : 0;
        $portait_value = ( 'on' === $vimeo_portait ) ? 1 : 0;
        $title_value = ( 'on' === $vimeo_title ) ? 1 : 0;
        $byline_value = ( 'on' === $vimeo_byline ) ? 1 : 0;
		$playsinline_value = ( 'on' === $vimeo_playsinline ) ? 1 : 0;
		$color_value = ltrim($vimeo_color, '#');

		$map = '';
        if( 'vimeo_url' === $vimeo_method && !empty($vimeo_url) ) {
            preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $vimeo_url, $match);
            $vimeo_exact_id = isset($match[3]) ? $match[3] : '';

			if (!empty($vimeo_exact_id)) {
				$map = sprintf('<iframe src="https://player.vimeo.com/video/%1$s?&autoplay=%11$s&loop=%3$s&muted=%2$s&controls=%4$s&title=%6$s&byline=%7$s&portrait=%5$s&#t=%8$s&color=%9$s&playsinline=%10$s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
					esc_attr( $vimeo_exact_id ),
					esc_attr( $mute_value ),
					esc_attr( $loop_value ),
					esc_attr( $control_value ),  
					esc_attr( $portait_value ),
					esc_attr( $title_value ),
					esc_attr( $byline_value ),
					esc_attr( $vimeo_start ),
					esc_attr( $color_value ),
					esc_attr( $playsinline_value ),
					esc_attr( $autoplay_value )
				);
			}
        } elseif ( 'vimeo_id' === $vimeo_method && !empty($vimeo_id) ) {
            $map = sprintf('<iframe src="https://player.vimeo.com/video/%1$s?&autoplay=%11$s&loop=%3$s&muted=%2$s&controls=%4$s&title=%6$s&byline=%7$s&portrait=%5$s&#t=%8$s&color=%9$s&playsinline=%10$s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                esc_attr( $vimeo_id ),
                esc_attr( $mute_value ),
                esc_attr( $loop_value ),
                esc_attr( $control_value ),  
                esc_attr( $portait_value ),
                esc_attr( $title_value ) ,
                esc_attr( $byline_value ),
                esc_attr( $vimeo_start ) ,
				esc_attr( $color_value ),
				esc_attr( $playsinline_value ),
				esc_attr( $autoplay_value )
             );
        } elseif ( 'embed_code' === $vimeo_method ) {
            $map = et_core_esc_previously( $vimeo_embed );
        }

		$inner_content = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_vimeo_video_container',
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
