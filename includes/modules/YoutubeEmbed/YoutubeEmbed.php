<?php

class INFTNC_YoutubeEmbed extends ET_Builder_Module {

	public $slug       = 'inftnc_youtube_embed';
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

		$this->name = esc_html__( 'Youtube Video - Infinity TNC', 'infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->main_css_element = "%%order_class%% .inftnc_youtube_embed iframe";
		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'iframe' => array(
				'label'    => esc_html__( 'Youtube', 'infinity-tnc-divi-modules' ),
				'selector' => 'iframe',
			),
		);
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Youtube Video', 'infinity-tnc-divi-modules' ),
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
		return array(
			'video_type' => array(
				'label'           => esc_html__( 'Video Type', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'video',
				'options'         => array(
					'video'            => esc_html__( 'Video', 'infinity-tnc-divi-modules' ),
					'playlist'         => esc_html__( 'Playlist', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
                
			),

            'video_method' => array(
				'label'           => esc_html__( 'Video/Playlist Method', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'video_url',
				'options'         => array(
                    'video_url'            => esc_html__( 'URL', 'infinity-tnc-divi-modules' ),
					'video_id'            => esc_html__( 'ID', 'infinity-tnc-divi-modules' ),
                    'embed_code'          => esc_html__( 'Embed Code', 'infinity-tnc-divi-modules' ),
    
				),
				'toggle_slug'     => 'main_content',   
			),

            'youtube_url' => array(
				'label'           => esc_html__( 'Youtube Video/Playlist URL', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'		  => 'https://www.youtube.com/watch?v=z8uxAkjll5g',
                'description'     => 'Use Video URL  or List URL based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'video_url',
                ),
			),

            'youtube_id' => array(
				'label'           => esc_html__( 'Youtube Video/Playlist ID', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
                'description'     => 'Use Video ID or List ID based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'video_id',
                ),
			),

            'youtube_embed' => array(
				'label'           => esc_html__( 'Youtube Video/Playlist Embed Code', 'nftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
                'description'     => 'Use Video Embed Code  or List Embed Code based on what you want to display.',
				'toggle_slug'     => 'main_content',
                'show_if'         => array(
                    'video_method' => 'embed_code',
                ),
			),

			'video_start' => array(
				'label'           => esc_html__( 'Start Time', 'infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'description'	  => 'Specify a start time in seconds',
				'default'          => '0',
				'default_on_front' => '',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'video_end' => array(
				'label'           => esc_html__( 'End Time', 'infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'default_on_front' => '',
				'description'	  => 'Specify an End time in seconds',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 1000,
					'step' => 1,
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'autoplay' => array(
				'label'             => esc_html__( 'Autoplay', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'mute' => array(
				'label'             => esc_html__( 'Mute', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'loop' => array(
				'label'             => esc_html__( 'Loop', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'player_control' => array(
				'label'             => esc_html__( 'Player Control', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
				)
			),

            'video_rel' => array(
				'label'             => esc_html__( 'External suggested videos.', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'video_options',
				'show_if_not'     => array(
					'video_method' => 'embed_code',
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
	public function render( $attrs, $content , $render_slug ) {

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
		$video_rel 			=  $this->props['video_rel'];
		
		//Autoplay Value
		( 'on' === $autoplay ) ? ( $autoplay_value = 1 ) : ( $autoplay_value = 0 );
		//Mute Value 
		( 'on' === $mute ) ? ( $mute_value = 1 ) : ( $mute_value = 0 );
		//Loop Value 
		( 'on' === $loop ) ? ( $loop_value = 1 ) : ( $loop_value = 0 );
		//Player Control 
		( 'on' === $player_control  ) ? ( $control_value = 1 ) : ( $control_value = 0 );
		//Video Rel 
		('on' === $video_rel  ) ? ( $rel_value = 1 ) : ( $rel_value = 0 );

		
        if ( 'video' === $video_type && 'video_url' === $video_method  ) {

			// Youtube URL 
			$url = $youtube_url;
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
			$youtube_exact_id = $match[1];

            $output = sprintf('<iframe src="https://www.youtube.com/embed/%1$s?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                /* 01 */ esc_attr( $youtube_exact_id ),
				/* 02 */ esc_attr( $video_start ),
				/* 03 */ esc_attr( $video_end ),
				/* 04 */ esc_attr( $autoplay_value ) ,
				/* 05 */ esc_attr( $mute_value ),
				/* 06 */ esc_attr( $loop_value ),
				/* 07 */ esc_attr( $control_value ),
				/* 08 */ esc_attr( $rel_value ),
            );

        } elseif ( 'video' === $video_type && 'video_id' === $video_method ) { 

           $output = sprintf('<iframe src="https://www.youtube.com/embed/%1$s?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                /* 01 */ esc_attr( $video_id ),
				/* 02 */ esc_attr( $video_start ) ,
				/* 03 */ esc_attr( $video_end ) ,
				/* 04 */ esc_attr( $autoplay_value ) ,
				/* 05 */ esc_attr( $mute_value ),
				/* 06 */ esc_attr( $loop_value ),
				/* 07 */ esc_attr( $control_value ) ,
				/* 08 */ esc_attr( $rel_value ),
            );

        } elseif ( 'video' === $video_type && 'embed_code' === $video_method ) { 

            $output = sprintf('%1$s',
                /* 01 */ wp_kses_post_deep( $video_embed ) ,
            );

        }  elseif ( 'playlist' === $video_type && 'video_url' === $video_method ) {

			//Youtube Playlist URL 
			$url =  $youtube_url;
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]list=)|youtu\.be/)([^"&?/ ]{34})%i', $url, $match);
			$youtube_exact_id = $match[1];

			$output = sprintf('<iframe src="https://www.youtube.com/embed/videoseries?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s&amp;list=%1$s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
				/* 01 */ esc_attr( $youtube_exact_id ),
				/* 02 */ esc_attr( $video_start ),
				/* 03 */ esc_attr( $video_end ),
				/* 04 */ esc_attr( $autoplay_value ),
				/* 05 */ esc_attr( $mute_value ),
				/* 06 */ esc_attr( $loop_value ),
				/* 07 */ esc_attr( $control_value ),
				/* 08 */ esc_attr( $rel_value ),
            );

        } elseif ( 'playlist' === $video_type && 'video_id' === $video_method ) {
 
            $output = sprintf('<iframe src="https://www.youtube.com/embed/videoseries?controls=%7$s&amp;autoplay=%4$s&amp;loop=%6$s&amp;mute=%5$s&amp;start=%2$s&amp;end=%3$s&amp;rel=%8$s&amp;list=%1$s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
				/* 01 */ esc_attr( $video_id ),
				/* 02 */ esc_attr( $video_start ),
				/* 03 */ esc_attr( $video_end ),
				/* 04 */ esc_attr( $autoplay_value ),
				/* 05 */ esc_attr( $mute_value ),
				/* 06 */ esc_attr( $loop_value ),
				/* 07 */ esc_attr( $control_value ),
				/* 08 */ esc_attr( $rel_value ),
            );
        } elseif ( 'playlist' === $video_type && 'embed_code' === $video_method ) {

            $output = sprintf('%1$s',/* 01 */ wp_kses_post_deep( $video_embed )  );
        }

        return $output;
	}
}
 
new INFTNC_YoutubeEmbed;
