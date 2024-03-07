<?php

class INFTNC_VimeoVideo extends ET_Builder_Module {

	public $slug       = 'inftnc_vimeo_video';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Vimeo Video - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
        $this->main_css_element = "%%order_class%%.inftnc_vimeo_video iframe";
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Vimeo Video', 'inftnc-infinity-tnc-divi-modules' ),
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
		return array (
			'vimeo_method' => array(
				'label'           => esc_html__( 'Vimeo Method', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'vimeo_url',
				'options'         => array(
                    'vimeo_url'            => esc_html__( 'URL', 'inftnc-infinity-tnc-divi-modules' ),
					'vimeo_id'            => esc_html__( 'ID', 'inftnc-infinity-tnc-divi-modules' ),
                    'embed_code'          => esc_html__( 'Embed Code', 'inftnc-infinity-tnc-divi-modules' ),
    
				),
				'toggle_slug'     => 'main_content',   
			),

            'vimeo_url' => array(
				'label'           => esc_html__( 'Vimeo Video URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Vimeo Video URL',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'vimeo_url',
                ),
			),

            'vimeo_id' => array(
				'label'           => esc_html__( 'Vimeo Video ID', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Vimeo Video ID.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'vimeo_id',
                ),
			),

            'vimeo_embed' => array(
				'label'           => esc_html__( 'Vimeo Video Embed Code', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
                'description'     => 'Use Vimeo Video Embed Code.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'embed_code',
                ),
			),

            'autoplay' => array(
				'label'             => esc_html__( 'Autoplay', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
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
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
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
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
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
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_portait' => array(
				'label'             => esc_html__( 'Intro Portrait', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_title' => array(
				'label'             => esc_html__( 'Intro Title', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_byline' => array(
				'label'             => esc_html__( 'Intro Byline', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$output = sprintf('<iframe src="https://player.vimeo.com/video/909768963?autoplay=1&loop=1&color=00adef&t=00h00m10s" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>',
        );

        return $output;
	}
}

new INFTNC_VimeoVideo;


