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
		// return sprintf( '<h1>%1$s</h1>', $this->props['content'] );

    //    $output = '<iframe width="560" height="315" src="https://www.youtube.com/embed/1aGwOBgyWTo?si=BX6edvmRQIO-YZkl&amp;start=1&amp;end=2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

        $output = '<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PL0BHfncpP5oSvjG1yxqmWCsjBD012nfbr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

        return $output;
	}
}
 
new INFTNC_YoutubeEmbed;
