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
		$start_param = (int) $video_start > 0 ? '&amp;start=' . (int) $video_start : '';
		$end_param   = (int) $video_end   > 0 ? '&amp;end='   . (int) $video_end   : '';

		$order_index = $block->parsed_block['orderIndex'] ?? 0;
		$iframe_id   = 'inftnc-yt-' . absint( $order_index );
		$end_script  = '';
		if ( (int) $video_end > 0 ) {
			$js_id  = esc_js( $iframe_id );
			$js_end = (int) $video_end;
			$end_script = "<script>(function(){var el=document.getElementById('" . $js_id . "'),et=" . $js_end . ";if(!el||et<=0)return;function p(d){try{el.contentWindow.postMessage(JSON.stringify(d),'https://www.youtube.com');}catch(x){}}window.addEventListener('message',function(e){if(e.origin!=='https://www.youtube.com'||e.source!==el.contentWindow)return;try{var d=JSON.parse(e.data);if(d.event==='infoDelivery'&&d.info&&d.info.currentTime>=et){p({event:'command',func:'pauseVideo',args:'',id:'player-" . $js_id . "'});}}catch(x){}});setInterval(function(){p({event:'listening',id:'player-" . $js_id . "'});},500);})();</script>";
		}

		$map = '';
        if ( 'video' === $video_type ) {
			$exact_id = '';
			if ( 'video_url' === $video_method && !empty($youtube_url) ) {
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match);
				$exact_id = isset($match[1]) ? $match[1] : '';
			} elseif ( 'video_id' === $video_method ) {
				// YouTube video IDs are exactly 11 chars from a fixed charset; reject anything else.
				$exact_id = preg_match( '/^[a-zA-Z0-9_-]{11}$/', $youtube_id ) ? $youtube_id : '';
			}

			if ( !empty($exact_id) && 'embed_code' !== $video_method ) {
				$map = sprintf('<iframe id="%9$s" src="https://www.youtube.com/embed/%1$s?controls=%2$s&amp;autoplay=%3$s&amp;loop=%4$s&amp;mute=%5$s%6$s%7$s&amp;rel=%8$s&amp;enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
					esc_attr( $exact_id ),
					esc_attr( $control_value ),
					esc_attr( $autoplay_value ),
					esc_attr( $loop_value ),
					esc_attr( $mute_value ),
					$start_param,
					$end_param,
					esc_attr( $rel_value ),
					esc_attr( $iframe_id )
				);
				$map .= $end_script;
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
				$map = sprintf('<iframe id="%9$s" src="https://www.youtube.com/embed/videoseries?controls=%1$s&amp;autoplay=%2$s&amp;loop=%3$s&amp;mute=%4$s%5$s%6$s&amp;rel=%7$s&amp;list=%8$s&amp;enablejsapi=1" title="YouTube playlist player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
					esc_attr( $control_value ),
					esc_attr( $autoplay_value ),
					esc_attr( $loop_value ),
					esc_attr( $mute_value ),
					$start_param,
					$end_param,
					esc_attr( $rel_value ),
					esc_attr( $playlist_id ),
					esc_attr( $iframe_id )
				);
				$map .= $end_script;
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
