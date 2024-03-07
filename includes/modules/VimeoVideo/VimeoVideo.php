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

            'vimeo_start' => array(
				'label'           => esc_html__( 'Start Time', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'description'	  => 'Specify a start time in seconds',
				'default'          => '0',
				'default_on_front' => '',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 1000,
					'step' => 1,
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
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

        $vimeo_method       = $this->props['vimeo_method'];
        $vimeo_url          = $this->props['vimeo_url']; 
        $vimeo_id           = $this->props['vimeo_id'];
        $vimeo_embed        = $this->props['vimeo_embed'];
        $vimeo_autoplay     = $this->props['autoplay'];
        $vimeo_mute         = $this->props['mute'];
        $vimeo_loop         = $this->props['loop'];
        $vimeo_control      = $this->props['player_control'];
        $vimeo_portait      = $this->props['intro_portait'];
        $vimeo_title        = $this->props['intro_title'];
        $vimeo_byline       = $this->props['intro_byline'];
        $vimeo_start        = $this->props['vimeo_start'];


        ( 'on' === $vimeo_autoplay ) ? ( $autoplay_value = 1 ) : ( $autoplay_value = 0 );
        ( 'on' === $vimeo_mute ) ? ( $mute_value = 1 ) : ( $mute_value = 0 );
        ( 'on' === $vimeo_loop ) ? ( $loop_value = 1 ) : ( $loop_value = 0 );
        ( 'on' === $vimeo_control ) ? ( $control_value = 1 ) : ( $control_value = 0 );
        ( 'on' === $vimeo_portait ) ? ( $portait_value = 1 ) : ( $portait_value = 0 );
        ( 'on' === $vimeo_title ) ? ( $title_value = 1 ) : ( $title_value = 0 );
        ( 'on' === $vimeo_byline ) ? ( $byline_value = 1 ) : ( $byline_value = 0 );


        if( 'vimeo_url' === $vimeo_method ) {

            // Vimeo URL 
			$url = $vimeo_url;
            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:player\.)?vimeo\.com\/(?:showcase\/)?(\d+)/i', $url, $match);
            $vimeo_exact_id = $match[1];

            $output = sprintf('<iframe src="https://player.vimeo.com/video/%1$s?&autoplay=1&loop=1&title=0&byline=0&portrait=0&#t=100s" width="640" height="360"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                /* 01 */ $vimeo_exact_id,
                /* 02 */ $mute_value,
                /* 03 */ $loop_value,
                /* 04 */ $control_value,  
                /* 05 */ $portait_value,
                /* 06 */ $title_value,
                /* 07 */ $byline_value,
                /* 08 */ $vimeo_start,
             );

        } elseif ( 'vimeo_id' === $vimeo_method ) {

            $output = sprintf('<iframe src="https://player.vimeo.com/video/909768963?h=b043407d65&autoplay=1&loop=1&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
            );

        } elseif ( 'embed_code' == $vimeo_method ) {

            $output = sprintf('<iframe src="https://player.vimeo.com/video/909768963?h=b043407d65&autoplay=1&loop=1&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
            );

        }

        return $output;
	}
}

new INFTNC_VimeoVideo;


