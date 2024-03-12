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
                    'share_button_child' => esc_html__( 'Share Button', 'infinity-tnc-divi-modules' ),
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
					'whatsApp'           => esc_html__( 'WhatsApp', 'infinity-tnc-divi-modules' ),
                    'twitter'            => esc_html__( 'X', 'infinity-tnc-divi-modules' ),
                    'youTube'            => esc_html__( 'YouTube', 'infinity-tnc-divi-modules' ),
                    'instagram'          => esc_html__( 'Instagram', 'infinity-tnc-divi-modules' ),
                    'weChat'             => esc_html__( 'WeChat', 'infinity-tnc-divi-modules' ),
                    'tikTok'             => esc_html__( 'TikTok ', 'infinity-tnc-divi-modules' ),
                    'telegram'           => esc_html__( 'Telegram ', 'infinity-tnc-divi-modules' ),
                    'snapchat'           => esc_html__( 'Snapchat ', 'infinity-tnc-divi-modules' ),
                    'kuaishou'           => esc_html__( 'Kuaishou ', 'infinity-tnc-divi-modules' ),
                    'sinaweibo'          => esc_html__( 'Sina Weibo ', 'infinity-tnc-divi-modules' ),
                    'qq'                 => esc_html__( 'QQ', 'infinity-tnc-divi-modules' ),
                    'pinterest'          => esc_html__( 'Pinterest', 'infinity-tnc-divi-modules' ),
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
				'label'           => esc_html__( 'Button Color', 'dicm-divi-custom-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_button_child',
				'tab_slug'        => 'advanced',
			),

			'button_padding_child' => array(
				'label'           => esc_html__( 'Button Padding', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'custom_margin',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button_child',
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
							'%%order_class%%',
						],
					),
	
					'font_size'      => array(
						'default' => '30px',
					),
	
					'line_height'    => array(
						'default' => '1em',
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

		$social_share = $this->props['social_share'];

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

		if( 'facebook'  ===  $social_share  ) {

			$share_button = sprintf('
			
				
			',
		
		   );

		} else {

		}


		// Render module content
		$output = sprintf('<div class="inftnc_share_button"> 
					%1$s
				</div>',
				$share_button
			);

        return $output;
	}
}

new SocialShareChild;