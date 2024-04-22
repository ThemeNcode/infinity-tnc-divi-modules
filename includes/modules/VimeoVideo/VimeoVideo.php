<?php
#[\AllowDynamicProperties]
class INFTNC_VimeoVideo extends ET_Builder_Module {

	public $slug       = 'inftnc_vimeo_video';
	public $vb_support = 'on';
	// Module Credits (Appears at the bottom of the module settings modal)
	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */

	public function init() {
		$this->name = esc_html__( 'Vimeo Video - Infinity TNC', 'infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->main_css_element = "%%order_class%% .inftnc_vimeo_video iframe";
		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'iframe' => array(
				'label'    => esc_html__( 'Iframe', 'infinity-tnc-divi-modules' ),
				'selector' => 'iframe',
			),
		);
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Vimeo Video', 'infinity-tnc-divi-modules' ),
                    'video_options' => array(
                        'title' => esc_html__( 'Video Options', 'infinity-tnc-divi-modules' ),
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

   /**
	 * Module's specific fields
	 * 
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_fields() {
		return array (
			'vimeo_method' => array(
				'label'           => esc_html__( 'Vimeo Method', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'vimeo_url',
				'options'         => array(
                    'vimeo_url'            => esc_html__( 'URL', 'infinity-tnc-divi-modules' ),
					'vimeo_id'            => esc_html__( 'ID', 'infinity-tnc-divi-modules' ),
                    'embed_code'          => esc_html__( 'Embed Code', 'infinity-tnc-divi-modules' ),
    
				),
				'toggle_slug'     => 'main_content',   
			),

            'vimeo_url' => array(
				'label'           => esc_html__( 'Vimeo Video URL', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'	      => 'https://vimeo.com/915873558',
                'description'     => 'Use Vimeo Video URL',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'vimeo_url',
                ),
			),

            'vimeo_id' => array(
				'label'           => esc_html__( 'Vimeo Video ID', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Vimeo Video ID.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'vimeo_id',
                ),
			),

            'vimeo_embed' => array(
				'label'           => esc_html__( 'Vimeo Video Embed Code', 'infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
                'description'     => 'Use Vimeo Video Embed Code.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'vimeo_method' => 'embed_code',
                ),
			),

            'vimeo_start' => array(
				'label'           => esc_html__( 'Start Time', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'description'	  => esc_html__( 'Time represented in minutes and/or seconds (for example,1m2s)', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'autoplay' => array(
				'label'             => esc_html__( 'Autoplay', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'description'		=> esc_html__( 'Automatically start playback of the video.', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'mute' => array(
				'label'             => esc_html__( 'Mute', 'infinity-tnc-divi-modules'),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'description'		=> esc_html__('Set video to mute on load. Viewers can still adjust the volume preferences in the player.','infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'loop' => array(
				'label'             => esc_html__( 'Loop', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'Play the video again when it reaches the end, infinitely.', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'player_control' => array(
				'label'             => esc_html__( 'Player Control', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'This parameter will hide all elements in the player (play bar, sharing buttons, etc) for a chromeless experience. ', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_portait' => array(
				'label'             => esc_html__( 'Intro Portrait', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'Show the author’s profile image', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_title' => array(
				'label'             => esc_html__( 'Intro Title', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'Show the video’s title.', 'infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

            'intro_byline' => array(
				'label'             => esc_html__( 'Intro Byline', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'Show the author of the video (byline).', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

			'playsinline' => array(
				'label'             => esc_html__( 'Plays Inline', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'		=> esc_html__( 'Play video inline on mobile devices instead of automatically going into fullscreen mode. Inline playback is enabled for all videos by default.', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),

			'vimeo_color' => array(
				'label'           => esc_html__( 'Color', 'infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'default'		  => '00adef',
				'description'	  => esc_html__( 'Specify the color of the video controls. Colors may be overridden by the embed settings of the video', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'vimeo_method' => 'embed_code',
				)
			),
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
	public function render( $attrs, $content, $render_slug ) {

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
		$vimeo_color 		= $this->props['vimeo_color'];
		$vimeo_playsinline  = $this->props['playsinline'];


        ( 'on' === $vimeo_autoplay ) ? ( $autoplay_value = 1 ) : ( $autoplay_value = 0 );
        ( 'on' === $vimeo_mute ) ? ( $mute_value = 1 ) : ( $mute_value = 0 );
        ( 'on' === $vimeo_loop ) ? ( $loop_value = 1 ) : ( $loop_value = 0 );
        ( 'on' === $vimeo_control ) ? ( $control_value = 1 ) : ( $control_value = 0 );
        ( 'on' === $vimeo_portait ) ? ( $portait_value = 1 ) : ( $portait_value = 0 );
        ( 'on' === $vimeo_title ) ? ( $title_value = 1 ) : ( $title_value = 0 );
        ( 'on' === $vimeo_byline ) ? ( $byline_value = 1 ) : ( $byline_value = 0 );
		( 'on' === $vimeo_playsinline ) ? ( $playsinline_value = 1 ) : ( $playsinline_value = 0 );

	
        if( 'vimeo_url' === $vimeo_method ) {

            // Vimeo URL 
			$url = $vimeo_url;
            preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $match);
            $vimeo_exact_id = $match[3];

            $output = sprintf('<iframe src="https://player.vimeo.com/video/%1$s?&autoplay=%11$s&loop=%3$s&muted=%2$s&controls=%4$s&title=%6$s&byline=%7$s&portrait=%5$s&#t=%8$s&color=%9$s&playsinline=%10$s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                /* 01 */ esc_attr( $vimeo_exact_id ),
                /* 02 */ esc_attr( $mute_value ),
                /* 03 */ esc_attr( $loop_value ),
                /* 04 */ esc_attr( $control_value ),  
                /* 05 */ esc_attr( $portait_value ),
                /* 06 */ esc_attr( $title_value ),
                /* 07 */ esc_attr( $byline_value ),
                /* 08 */ esc_attr( $vimeo_start ),
				/* 09 */ esc_attr( $vimeo_color ),
				/* 10 */ esc_attr( $playsinline_value ),
				/* 11 */ esc_attr( $autoplay_value )
             );
			
        } elseif ( 'vimeo_id' === $vimeo_method ) {

            $output = sprintf('<iframe src="https://player.vimeo.com/video/%1$s?&autoplay=%11$s&loop=%3$s&muted=%2$s&controls=%4$s&title=%6$s&byline=%7$s&portrait=%5$s&#t=%8$s&color=%9$s&playsinline=%10$s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                /* 01 */ esc_attr( $vimeo_id ),
                /* 02 */ esc_attr( $mute_value ),
                /* 03 */ esc_attr( $loop_value ),
                /* 04 */ esc_attr( $control_value ),  
                /* 05 */ esc_attr( $portait_value ),
                /* 06 */ esc_attr( $title_value ) ,
                /* 07 */ esc_attr( $byline_value ),
                /* 08 */ esc_attr( $vimeo_start ) ,
				/* 09 */ esc_attr( $vimeo_color ),
				/* 10 */ esc_attr( $playsinline_value ),
				/* 11 */ esc_attr( $autoplay_value )
             );
        } elseif ( 'embed_code' == $vimeo_method ) {

            $output = sprintf('%1$s', /* 01 */ wp_kses_post( $vimeo_embed )  );

        }

        return $output;
	}
}

new INFTNC_VimeoVideo;








