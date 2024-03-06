<?php

class INFTNC_YoutubeEmbed extends ET_Builder_Module {

	public $slug       = 'inftnc_youtube_embed';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {

		$this->name = esc_html__( 'Youtube Video - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
        $this->main_css_element = "%%order_class%%.inftnc_youtube_embed iframe";
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Youtube Video', 'inftnc-infinity-tnc-divi-modules' ),
                    'video_options' => array(
                        'title' => esc_html__( 'Video Options', 'inftnc-infinity-tnc-divi-modules' ),
                    ),
				),
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
				 'height'	=> array(
					'options' => array(
						'height' => array(
							'default'        => '500px',
							'default_tablet' => '500px',
							'default_phone'  => '500px',
						),
					),
				 ),
				 'text'     => false,
				 'fonts'	=> false,
				 'filters'  => false,
		);
   }

	public function get_fields() {
		return array(
			'video_type' => array(
				'label'           => esc_html__( 'Video Type', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'video',
				'options'         => array(
					'video'            => esc_html__( 'Video', 'inftnc-infinity-tnc-divi-modules' ),
					'playlist'         => esc_html__( 'Playlist', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
                
			),

            'video_method' => array(
				'label'           => esc_html__( 'Video Method', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'video_url',
				'options'         => array(
                    'video_url'            => esc_html__( 'URL', 'inftnc-infinity-tnc-divi-modules' ),
					'video_id'            => esc_html__( 'ID', 'inftnc-infinity-tnc-divi-modules' ),
                    'embed_code'          => esc_html__( 'Embed Code', 'inftnc-infinity-tnc-divi-modules' ),
    
				),
				'toggle_slug'     => 'main_content',   
			),

            'youtube_url' => array(
				'label'           => esc_html__( 'Youtube Video URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Video URL  or List URL based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'video_url',
                ),
			),

            'youtube_id' => array(
				'label'           => esc_html__( 'Youtube Video ID', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Video ID or List ID based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'video_id',
                ),
			),

            'youtube_embed' => array(
				'label'           => esc_html__( 'Youtube Video Embed Code', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
                'description'     => 'Use Video Embed Code  or List Embed Code based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'embed_code',
                ),
			),

			'video_start' => array(
				'label'           => esc_html__( 'Start Time', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'default'          => '14',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'toggle_slug'     => 'video_options',
				
			),

            'video_end' => array(
				'label'           => esc_html__( 'End Time', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'default'          => '14',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'toggle_slug'     => 'video_options',
			),

            'autoplay' => array(
				'label'             => esc_html__( 'Autoplay', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
			),

            'mute' => array(
				'label'             => esc_html__( 'Mute', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
			),

            'loop' => array(
				'label'             => esc_html__( 'Loop', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
			),

            'player_control' => array(
				'label'             => esc_html__( 'Player Control', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
			),

            'privacy_enhanced' => array(
				'label'             => esc_html__( 'Enable privacy-enhanced mode.', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

        $video_type         =  $this->props['video_type'];
        $video_method       =  $this->props['video_method'];
        $youtube_url        =  $this->props['youtube_url'];
        $video_id           =  $this->props['youtube_id'];
        $video_embed        =  $this->props['youtube_embed'];
        $video_start        =  $this->props['video_start'];
        $video_end          =  $this->props['video_end'];
        $autoplay           =  $this->props['autoplay'];
        $mute               =  $this->props['mute'];
        $loop               =  $this->props['loop'];
        $player_control     =  $this->props['player_control'];
        $privacy_enhanced   =  $this->props['privacy_enhanced'];

        
        
        if ( 'video' === $video_type && 'video_url' === $video_method  ) {
            
            $output = sprintf('<iframe width="560" height="315" src="%1$s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                /* 01 */ $youtube_url,
            );

        } elseif ( 'video' === $video_type && 'video_id' === $video_method ) { 

            $output = sprintf('<iframe width="560" height="315" src="https://www.youtube.com/embed/%1$s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                /* 01 */ $video_id,
            );

        } elseif ( 'video' === $video_type && 'embed_code' === $video_method ) { 

            $output = sprintf('%1$s',
                /* 01 */ $video_embed,
            );

        }  elseif ( 'playlist' === $video_type && 'video_url' === $video_method ) {
 
            $output = sprintf('<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/videoseries?si=ral8tYgzpgTVRktm&amp;list=PL0BHfncpP5oSvjG1yxqmWCsjBD012nfbr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                
            );
        } elseif ( 'playlist' === $video_type && 'video_id' === $video_method ) {
 
            $output = sprintf('<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/videoseries?si=ral8tYgzpgTVRktm&amp;list=PL0BHfncpP5oSvjG1yxqmWCsjBD012nfbr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                
            );
        } elseif ( 'playlist' === $video_type && 'embed_code' === $video_method ) {
 
            $output = sprintf('<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/videoseries?si=ral8tYgzpgTVRktm&amp;list=PL0BHfncpP5oSvjG1yxqmWCsjBD012nfbr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                
            );
        }

        return $output;
	}
}
 
new INFTNC_YoutubeEmbed;
