<?php
class SocialShareChild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'inftnc_social_share_child';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'social_share';


	// Full Visual Builder support
	public $vb_support = 'on';

	function init() {
		// Module name
		$this->name             				= esc_html__( 'Social Network', 'infinity-tnc-divi-modules' );
        $this->advanced_setting_title_text 		= esc_html__( 'New Social Network', 'infinity-tnc-divi-modules' );
		$this->settings_text               		= esc_html__( 'Social Network Settings', 'infinity-tnc-divi-modules' );


		// Toggle settings
        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Network', 'infinity-tnc-divi-modules' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
					'share_button_child'	=> array(
						'title'	=> esc_html__( 'Share Button',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 41,
					),
					'share_icon'	=> array(
						'title'	=> esc_html__( 'Share Button Icon',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 42,
					),
                ),
            ),
        );
	}

	/**
	 * Module's specific fields
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_fields() {
		
		return array(
			'social_share'     => array(
				'label'              => esc_html__( 'Social Network', 'infinity-tnc-divi-modules' ),
				'type'               => 'select',
				'option_category'    => 'basic_option',
				'class'              => '',
				'options'         => array(
                    ''                   => esc_html__( 'Select a Network', 'infinity-tnc-divi-modules' ),
					'facebook'           => esc_html__( 'Facebook', 'infinity-tnc-divi-modules' ),
					'whatsapp'           => esc_html__( 'WhatsApp', 'infinity-tnc-divi-modules' ),
                    'twitter'            => esc_html__( 'X', 'infinity-tnc-divi-modules' ),
					'pinterest'          => esc_html__( 'Pinterest', 'infinity-tnc-divi-modules' ),
                    'wechat'             => esc_html__( 'WeChat', 'infinity-tnc-divi-modules' ),
                    'tikTok'             => esc_html__( 'TikTok ', 'infinity-tnc-divi-modules' ),
                    'telegram'           => esc_html__( 'Telegram ', 'infinity-tnc-divi-modules' ),
                    'snapchat'           => esc_html__( 'Snapchat ', 'infinity-tnc-divi-modules' ),
                    'kuaishou'           => esc_html__( 'Kuaishou ', 'infinity-tnc-divi-modules' ),
                    'sinaweibo'          => esc_html__( 'Sina Weibo ', 'infinity-tnc-divi-modules' ),
                    'qq'                 => esc_html__( 'QQ', 'infinity-tnc-divi-modules' ),
                    'reddit'             => esc_html__( 'Reddit', 'infinity-tnc-divi-modules' ),
                    'quora'              => esc_html__( 'Quora', 'infinity-tnc-divi-modules' ),
                    'discord'            => esc_html__( 'Discord', 'infinity-tnc-divi-modules' ),
                    'twitch'             => esc_html__( 'Twitch', 'infinity-tnc-divi-modules' ),
                    'tumblr'             => esc_html__( 'Tumblr', 'infinity-tnc-divi-modules' ), 
                    'bluesky'            => esc_html__( 'Bluesky', 'infinity-tnc-divi-modules' ),
                    'threads'            => esc_html__( 'Threads', 'infinity-tnc-divi-modules' ),

				),
				'description'        => esc_html__( 'Choose the social network', 'infinity-tnc-divi-modules' ),
				'toggle_slug'        => 'main_content',
			),

			'button_color_child' => array(
				'label'           => esc_html__( 'Button Background Color', 'infinity-tnc-divi-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_button_child',
				'tab_slug'        => 'advanced',
			),

			'button_padding_child' => array(
				'label'           => esc_html__( 'Button Padding', 'infinity-tnc-divi-modules' ),
				'type'            => 'custom_margin',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button_child',
			),

			'icon_color_child' => array(
				'label'           => esc_html__( 'Icon Color', 'infinity-tnc-divi-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_icon',
				'tab_slug'        => 'advanced',
			),

			'icon_size_child' => array(
				'label'           => esc_html__( 'Icon Size', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_icon',
				'allowed_units'    => array('px'),
				'default_on_front' => true,
				'default'          => 16,
				'default_unit'     => 'px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			 ),

			 'use_icon' => array(
				'label'             => esc_html__( 'Use Icon', 'inftnc-infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'options'           => array(
					'on'  => esc_html__( 'On', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'Off', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_icon',
			 ),

			 'use_fonticon' => array(
				'label'               => esc_html__( 'Share Button Icon', 'et_builder' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'share_icon',
				'show_if'			  => array (
					'use_icon'        => 'on',
				)
			),
			
		);
	}

/**
	 * Module's advanced fields configuration
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_advanced_fields_config() { 
		return array(
			'fonts'           => array( 
				'share_button_text_child' => array(
					'label'          => esc_html__( 'Share Button','infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% .inftnc_social_text',
						],
					),
	
					'font_size'      => array(
						'default' => '30px',
					),
	
					'line_height'    => array(
						'default' => '0em',
					),
	
					'text_alignment'	  => false,
	
					'letter_spacing' => array(
						'default' => '0px',
					),
	
				),
			),
			'text'	     		 => false,
			'link_options'       => false,
			'filters'            => false,
		);
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes
	 * @param string $content     Content being processed
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string module's rendered output
	 */
	function render( $attrs, $content = null, $render_slug ) {
		global $inftnc_social_share_props;

		$social_layout = $inftnc_social_share_props['button_layout'];
		$social_share = $this->props['social_share'];
		$use_fonts     = $this->props['use_fonticon'];

		var_dump($use_fonts);

		if( '' !== $this->props['button_padding_child'] ) {  
			$button_data = 	explode("|", $this->props["button_padding_child"]);
			$top = $button_data[0];
			$right = $button_data[1];
			$bottom = $button_data[2];
			$left = $button_data[3];
		}
		
		$order_class           = self::get_module_order_class( $render_slug );

		wp_enqueue_script('inftnc-social-share');

	    // Module classnames
		$this->add_classname(
			array(
				'inftnc_social_share_icon',
				'inftnc_social_share_button',
			)
		);
		// Remove Module Class Name
        $this->remove_classname(
			array(
				$render_slug,
				'et_pb_module',
				'et_pb_section_video',
				'et_pb_preload',
				'et_pb_section_parallax',
			)
		);

	    // Render social share button 
		if( 'facebook' === $social_share ) {

			global $post;
			$post_title   = get_the_title($post->ID); // Get the WordPress post title
			$share_button = sprintf('
					<a class="inftnc_share_link inftnc_fb_share_link" href="%1$s">
							%2$s
							%3$s
							%4$s
					</a>',
			/* 01 */ 'https://www.facebook.com/sharer/sharer.php?u='. urlencode(get_permalink()) .'&amp;t='.urlencode($post_title).'',
			/* 02 */ 'icon_with_text' === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_fb_text">%2$s</span>
						%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					 esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe093;</span>'), 
					 esc_html__( ' Share On Facebook', 'infinity-tnc-divi-modules'),
					) : '', 
			/* 03 */ 'only_icon'  === $social_layout ? sprintf('
							%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',

					esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe093;</span>'),

					) : '',
			
		    /*04 */  'only_text'  === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_fb_text">%1$s</span>
					 ',

					 esc_html__( ' Share On Facebook', 'infinity-tnc-divi-modules'),

					 ) : '',
			);

		} else if ( 'whatsapp' === $social_share ) {
			global $post;
			$post_title   = get_the_title($post->ID); // Get the WordPress post title
			$share_button = sprintf('
					<a class="inftnc_share_link inftnc_whatsapp_share_link" href="%1$s">
							%2$s
							%3$s
							%4$s
					</a>',
			/* 01 */ 'https://api.whatsapp.com/send?text=%'.urlencode( $post_title ).'% %'.urlencode( get_permalink() ).'%',
			/* 02 */ 'icon_with_text' === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_whatsapp_text">%2$s</span>
						%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					 esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe093;</span>'), 
					 esc_html__( 'Share On WhatsApp', 'infinity-tnc-divi-modules'), 
					) : '', 
			/* 03 */ 'only_icon'  === $social_layout ? sprintf('
							%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe093;</span>'),

					) : '',
			
		    /*04 */  'only_text'  === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_whatsapp_text">%1$s</span>
					 ',
					 esc_html__( 'Share On WhatsApp', 'infinity-tnc-divi-modules'), 

					 ) : '',
			);

		 } else if ( 'twitter' === $social_share ) {

			global $post;

			// Get post title and excerpt
			$post_title = get_the_title($post->ID);
			$post_excerpt = get_the_excerpt($post->ID);

		   // Encode the post title and excerpt for use in URL
			$encoded_title = urlencode($post_title);
			$encoded_excerpt = urlencode($post_excerpt);

			// Get post permalink
			$post_permalink = get_permalink($post->ID);

			// Encode the post permalink for use in URL
			$encoded_permalink = urlencode($post_permalink);

			// Twitter share link with dynamic title, excerpt, and permalink
			$twitter_share_link = 'https://twitter.com/intent/tweet?url=' . $encoded_permalink . '&text=' . $encoded_title . '%20-%20' . $encoded_excerpt;

			$share_button = sprintf('
					<a class="inftnc_share_link inftnc_twitter_share_link" href="%1$s">
							%2$s
							%3$s
							%4$s
					</a>',
			/* 01 */ $twitter_share_link,
			/* 02 */ 'icon_with_text' === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_twitter_text">%2$s</span>
						%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					 esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe094;</span>'), 
					 esc_html__( 'Share On X', 'infinity-tnc-divi-modules'), 
					) : '', 
			/* 03 */ 'only_icon'  === $social_layout ? sprintf('
							%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe094;</span>'),

					) : '',
			
		    /*04 */  'only_text'  === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_twitter_text">%1$s</span>
					 ',
					 esc_html__( 'Share On X', 'infinity-tnc-divi-modules'), 

					 ) : '',
			);

		} else if ( 'pinterest' === $social_share ) {

			// Get the current post
			global $post;

			// Get post title and excerpt
			$post_title = get_the_title($post->ID);

			// Get post permalink
			$post_permalink = get_permalink($post->ID);

			// Construct the Pinterest share link
			$pinterest_share_link = 'https://pinterest.com/pin/create/button/?url=' . urlencode($post_permalink) . '&description=' . urlencode($post_title);

			$share_button = sprintf('
					<a class="inftnc_share_link inftnc_pinterest_share_link" href="%1$s">
							%2$s
							%3$s
							%4$s
					</a>',
			/* 01 */ $pinterest_share_link,
			/* 02 */ 'icon_with_text' === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_pinterest_text">%2$s</span>
						%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					 esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe095;</span>'), 
					 esc_html__( 'Share On Pinterest', 'infinity-tnc-divi-modules'), 
					) : '', 
			/* 03 */ 'only_icon'  === $social_layout ? sprintf('
							%1$s
					',
					/* 01 */ $use_fonts ? sprintf('<span class="inftnc_social_icon et-pb-icon">%1$s</span>',
					esc_attr( et_pb_process_font_icon( $use_fonts ) )) : sprintf('<span class="inftnc_social_icon et-pb-icon">&#xe095;</span>'),

					) : '',
			
		    /*04 */  'only_text'  === $social_layout ? sprintf('
						<span class="inftnc_social_text inftnc_pinterest_text">%1$s</span>
					 ',
					 esc_html__( 'Share On Pinterest', 'infinity-tnc-divi-modules'), 

					 ) : '',
			);

		}


		//Button Bg Color
		if( '' !== $this->props['button_color_child'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							background-color:%1$s !important;
						',
						$this->props['button_color_child'],
					),
				)
			);
		}
		
		//Icon Color 
		if( '' !== $this->props['icon_color_child'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_icon.et-pb-icon',
					'declaration' => sprintf(
						'color: %1$s !important;',
						$this->props['icon_color_child']
					),
				)
			);
		}
		
		//Icon Size 
		if( '' !== $this->props['icon_size_child'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_icon.et-pb-icon ',
					'declaration' => sprintf(
						'
							font-size:%1$s !important;
						',
						$this->props['icon_size_child'],
					),
				)
			);
		}

		//Share button padding 

		if( '' !== $this->props['button_padding_child'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							padding:%1$s %2$s %3$s %4$s !important;
						',
						$top,
						$right,
						$bottom,
						$left
					),
				)
			);
		}

		// Render module content
		$output = sprintf('
					<div class="inftnc_share_button %2$s">
						%1$s
			      	</div>',
					$share_button,
					$order_class
			);

        return $output;
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}
}

new SocialShareChild;