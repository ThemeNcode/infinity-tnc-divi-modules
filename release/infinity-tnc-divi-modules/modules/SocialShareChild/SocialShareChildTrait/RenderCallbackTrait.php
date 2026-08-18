<?php
/**
 * SocialShareChild::render_callback().
 *
 * @package INFTNC\Modules\SocialShareChild
 * @since ??
 */

namespace INFTNC\Modules\SocialShareChild\SocialShareChildTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

// phpcs:disable ET.Sniffs.ValidVariableName.UsedPropertyNotSnakeCase -- WP use snakeCase in \WP_Block_Parser_Block

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use ET\Builder\Packages\ModuleUtils\ModuleUtils;
use INFTNC\Modules\SocialShareChild\SocialShareChild;

trait RenderCallbackTrait {
	use ModuleClassnamesTrait;
	use ModuleStylesTrait;
	use ModuleScriptDataTrait;

	/**
	 * Build the share URL for the given network.
	 *
	 * @param string $network Social network key.
	 *
	 * @return string Share URL.
	 */
	private static function get_share_url( string $network ): string {
		$post_url     = rawurlencode( get_permalink() );
		$post_title   = rawurlencode( get_the_title() );
		$post_excerpt = rawurlencode( get_the_excerpt() );

		$urls = [
			'facebook'  => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url . '&t=' . $post_title,
			'whatsapp'  => 'https://api.whatsapp.com/send?text=%' . $post_title . '% %' . $post_url . '%',
			'twitter'   => 'https://twitter.com/intent/tweet?url=' . $post_url . '&text=' . $post_title . '%20-%20' . $post_excerpt,
			'pinterest' => 'https://pinterest.com/pin/create/button/?url=' . $post_url . '&description=' . $post_title,
			'linekdin'  => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $post_url . '&title=' . $post_title . '&summary=' . $post_excerpt,
			'telegram'  => 'https://t.me/share/url?url=' . $post_url . '&text=' . $post_title,
			'reddit'    => 'https://www.reddit.com/submit?url=' . $post_url . '&title=' . $post_title,
			'tumblr'    => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $post_url . '&title=' . $post_title . '&caption=' . $post_excerpt,
			'email'     => 'mailto:?subject=' . $post_title . '&body=Hey,%0A%0AI%20found%20this%20interesting%20post%20and%20thought%20you%20might%20like%20it:%0A%0A' . $post_title . '%0A' . $post_excerpt . '%0A%0ARead%20more%20here:%20' . $post_url,
			'blogger'   => 'https://www.blogger.com/blog-this.g?u=' . $post_url . '&n=' . $post_title . '&t=' . $post_excerpt,
		];

		return $urls[ $network ] ?? '#';
	}

	/**
	 * Build the icon HTML span for the given network.
	 *
	 * @param string $network Social network key.
	 *
	 * @return string Icon HTML.
	 */
	private static function get_network_icon( string $network ): string {
		$icons = [
			'facebook'  => '<span class="inftnc_social_icon inftnc_social_fb"></span>',
			'whatsapp'  => '<span class="inftnc_social_icon inftnc_social_whatsapp"></span>',
			'twitter'   => '<span class="inftnc_social_icon inftnc_social_twiiter et-pb-icon">&#xe094;</span>',
			'pinterest' => '<span class="inftnc_social_icon inftnc_soical_pinterest"></span>',
			'linekdin'  => '<span class="inftnc_social_icon inftnc_soical_linekdin"></span>',
			'telegram'  => '<span class="inftnc_social_icon inftnc_soical_telegram"></span>',
			'reddit'    => '<span class="inftnc_social_icon inftnc_soical_reddit"></span>',
			'tumblr'    => '<span class="inftnc_social_icon inftnc_soical_tumblr"></span>',
			'email'     => '<span class="inftnc_social_icon inftnc_soical_email"><i class="fas fa-envelope"></i></span>',
			'blogger'   => '<span class="inftnc_social_icon inftnc_soical_blogger"></span>',
		];

		return $icons[ $network ] ?? '';
	}

	/**
	 * Build the label text for the given network.
	 *
	 * @param string $network Social network key.
	 *
	 * @return string Translated label.
	 */
	private static function get_network_label( string $network ): string {
		$labels = [
			'facebook'  => esc_html__( 'Share on Facebook', 'infinity-tnc-divi-modules' ),
			'whatsapp'  => esc_html__( 'Share on WhatsApp', 'infinity-tnc-divi-modules' ),
			'twitter'   => esc_html__( 'Share on X', 'infinity-tnc-divi-modules' ),
			'pinterest' => esc_html__( 'Share on Pinterest', 'infinity-tnc-divi-modules' ),
			'linekdin'  => esc_html__( 'Share on LinkedIn', 'infinity-tnc-divi-modules' ),
			'telegram'  => esc_html__( 'Share on Telegram', 'infinity-tnc-divi-modules' ),
			'reddit'    => esc_html__( 'Share on Reddit', 'infinity-tnc-divi-modules' ),
			'tumblr'    => esc_html__( 'Share on Tumblr', 'infinity-tnc-divi-modules' ),
			'email'     => esc_html__( 'Share on Email', 'infinity-tnc-divi-modules' ),
			'blogger'   => esc_html__( 'Share on Blogger', 'infinity-tnc-divi-modules' ),
		];

		return $labels[ $network ] ?? $network;
	}

	/**
	 * SocialShareChild module render callback.
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

		$data    = $attrs['socialShareChildData']['innerContent']['desktop']['value'] ?? [];
		$raw_network = $data['social_share'] ?? 'facebook';

		// divi/select inside group-items can store a numeric index instead of the value string.
		// Resolve it back to the correct key using the ordered network list.
		$network_keys = [
			'facebook', 'whatsapp', 'twitter', 'pinterest',
			'linekdin', 'telegram', 'reddit', 'tumblr', 'email', 'blogger',
		];
		if ( is_numeric( $raw_network ) ) {
			$network = $network_keys[ (int) $raw_network ] ?? 'facebook';
		} elseif ( in_array( $raw_network, $network_keys, true ) ) {
			$network = $raw_network;
		} else {
			$network = 'facebook';
		}

		$share_url = self::get_share_url( $network );
		$icon_html = self::get_network_icon( $network );
		$label     = self::get_network_label( $network );

		$network_class_key = ( 'facebook' === $network ) ? 'fb' : $network;
		$text_span = sprintf( '<span class="inftnc_social_text inftnc_%s_text">%s</span>', esc_attr( $network_class_key ), esc_html( $label ) );

		$link_html = sprintf(
			'<a class="inftnc_share_link inftnc_%s_share_link" href="%s" target="_blank" rel="noopener noreferrer">%s%s</a>',
			esc_attr( $network_class_key ),
			esc_url( $share_url ),
			$text_span,
			$icon_html
		);

		$button_html = HTMLUtility::render(
			[
				'tag'               => 'div',
				'attributes'        => [
					'class' => 'inftnc_share_button',
				],
				'childrenSanitizer' => 'et_core_esc_previously',
				'children'          => $link_html,
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
				'classnamesFunction'  => [ SocialShareChild::class, 'module_classnames' ],
				'stylesComponent'     => [ SocialShareChild::class, 'module_styles' ],
				'scriptDataComponent' => [ SocialShareChild::class, 'module_script_data' ],
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
				) . $button_html,
			]
		);
	}
}
