<?php
/**
 * YoutubeEmbed::render_callback()
 *
 * @package INFTNC\Modules\YoutubeEmbed
 * @since ??
 */

namespace INFTNC\Modules\YoutubeEmbed\YoutubeEmbedTrait;

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
	 * Youtube Embed module render callback which outputs server side rendered HTML on the Front-End.
	 *
	 * @since ??
	 *
	 * @param array          $attrs    Block attributes that were saved by VB.
	 * @param string         $content  Block content.
	 * @param \WP_Block      $block    Parsed block object that being rendered.
	 * @param ModuleElements $elements ModuleElements instance.
	 *
	 * @return string HTML rendered of Youtube Video module.
	 */
	public static function render_callback( $attrs, $content, $block, $elements ) {
		// Get attribute values from the consolidated youtubeEmbedData array.
		$youtube_data       = $attrs['youtubeEmbedData']['innerContent']['desktop']['value'] ?? [];
		$video_type         = $youtube_data['video_type'] ?? 'video';
		$video_method       = $youtube_data['video_method'] ?? 'video_url';
		$youtube_url        = $youtube_data['youtube_url'] ?? 'https://www.youtube.com/watch?v=z8uxAkjll5g';
		$youtube_id         = $youtube_data['youtube_id'] ?? '';
		$youtube_embed      = $youtube_data['youtube_embed'] ?? '';
		$video_start        = $youtube_data['video_start'] ?? '0';
		$video_end          = $youtube_data['video_end'] ?? '0';
		$autoplay           = $youtube_data['autoplay'] ?? 'on';
		$mute               = $youtube_data['mute'] ?? 'off';
		$loop               = $youtube_data['loop'] ?? 'off';
		$player_control     = $youtube_data['player_control'] ?? 'off';
		$video_rel 			= $youtube_data['video_rel'] ?? 'off';

        $autoplay_value = ( 'on' === $autoplay ) ? 1 : 0;
        $mute_value = ( 'on' === $mute ) ? 1 : 0;
        $loop_value = ( 'on' === $loop ) ? 1 : 0;
        $control_value = ( 'on' === $player_control ) ? 1 : 0;
		$rel_value = ( 'on' === $video_rel ) ? 1 : 0;

		$map = '';
        if ( 'video' === $video_type ) {
			$exact_id = '';
			if ( 'video_url' === $video_method && !empty($youtube_url) ) {
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match);
				$exact_id = isset($match[1]) ? $match[1] : '';
			} elseif ( 'video_id' === $video_method ) {
				$exact_id = $youtube_id;
			}

			if ( !empty($exact_id) && 'embed_code' !== $video_method ) {
				$map = sprintf('<iframe src="https://www.youtube.com/embed/%1$s?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
					esc_attr( $exact_id ),
					esc_attr( $video_start ),
					esc_attr( $video_end ),
					esc_attr( $autoplay_value ),
					esc_attr( $mute_value ),
					esc_attr( $loop_value ),
					esc_attr( $control_value ),
					esc_attr( $rel_value )
				);
			} elseif ( 'embed_code' === $video_method ) {
				$map = et_core_esc_previously( $youtube_embed );
			}
        } elseif ( 'playlist' === $video_type ) {
			$playlist_id = '';
			if ( 'video_url' === $video_method && !empty($youtube_url) ) {
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]list=)|youtu\.be/)([^"&?/ ]{34})%i', $youtube_url, $match);
				$playlist_id = isset($match[1]) ? $match[1] : '';
			} elseif ( 'video_id' === $video_method ) {
				$playlist_id = $youtube_id;
			}

			if ( !empty($playlist_id) && 'embed_code' !== $video_method ) {
				$map = sprintf('<iframe src="https://www.youtube.com/embed/videoseries?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s&amp;list=%1$s" title="YouTube playlist player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
					esc_attr( $playlist_id ),
					esc_attr( $video_start ),
					esc_attr( $video_end ),
					esc_attr( $autoplay_value ),
					esc_attr( $mute_value ),
					esc_attr( $loop_value ),
					esc_attr( $control_value ),
					esc_attr( $rel_value )
				);
			} elseif ( 'embed_code' === $video_method ) {
				$map = et_core_esc_previously( $youtube_embed );
			}
        }

		$inner_content = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_youtube_video_container',
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
