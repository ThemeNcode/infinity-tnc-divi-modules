<?php

class INFTNC_TypeWriter extends ET_Builder_Module {

	public $slug       = 'inftnc_type_writer';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {

		$this->name = esc_html__( 'Typewriter - Infinity TNC', 'infinity-tnc-divi-modules' );
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Typing Text', 'infinity-tnc-divi-modules' ),
                    'typing_options' => array(
                        'title' => esc_html__( 'Typing Effect Options', 'infinity-tnc-divi-modules' ),
                    ),
				),
			),
		);

		$this->custom_css_fields = array(
			'main_title' => array(
				'label'    => esc_html__( 'Main Title Text', 'infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_typewriter_main_title',
			),
			'before_text' => array(
				'label'    => esc_html__( 'Before Title Text', 'infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_before_text',
			),

			'after_text' => array(
				'label'    => esc_html__( 'After Title Text', 'infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_after_text',
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
				'title' => array(
					'label'          => esc_html__( 'Main Title','infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% h1.inftnc_typewriter_main_title',
							'%%order_class%% h2.inftnc_typewriter_main_title',
							'%%order_class%% h3.inftnc_typewriter_main_title',
							'%%order_class%% h4.inftnc_typewriter_main_title',
							'%%order_class%% h5.inftnc_typewriter_main_title',
							'%%order_class%% h6.inftnc_typewriter_main_title',
						],
					),

					'font_size'      => array(
						'default' => '30px',
					),

					'line_height'    => array(
						'default' => '1em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h1',
						'label'   => esc_html__( 'Heading Level', 'infinity-tnc-divi-modules' ),
					),
				),

				'before_title_text' => array(
					'label'          => esc_html__( 'Before Title','infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% .inftnc_before_text',
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

				'after_title_text' => array (
					'label'          => esc_html__( 'After Title','infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% .inftnc_after_text',
						],
					),

					'font_size'      => array(
						'default' => '30px',
					),

					'line_height'    => array(
						'default' => '1em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			 ),

			'text'     => false,
		);
   }

	public function get_fields() {

		return array(

			'before_text' => array(
				'label'           => esc_html__( 'Before Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => esc_html__( 'I am a Heading with', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

            'typing_text' => array(
				'label'           => esc_html__( 'Typing Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => esc_html__( 'Typewriter|Typing Animation', 'infinity-tnc-divi-modules' ),
				'description'	  => esc_html__( 'Use | to separate multiple values. Ex. Text 1 | Text 2 | Text 3', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

            'after_text' => array(
				'label'           => esc_html__( 'After Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => esc_html__( 'Effect', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

            'typing_speed' => array(
				'label'           => esc_html__( 'Typing Speed (ms)', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => '75',
				'toggle_slug'     => 'typing_options',
			),

            'typing_backspeed' => array(
				'label'           => esc_html__( 'Typing BackSpeed (ms)', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => '75',
                'description'     => esc_html__( 'The BackSpeed between deleting each character.', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'typing_options',
			),

            'pause_for' => array(
				'label'           => esc_html__( 'Pause Time (ms)', 'infinity-tnc-divi-modules' ),
                'description'     => esc_html__( 'The pause duration after a text is typed.','infinity-tnc-divi-modules'),
				'type'            => 'text',
				'default'		  => '1500',
				'toggle_slug'     => 'typing_options',
			),

            'typing_cursor' => array(
				'label'           => esc_html__( 'Cursor', 'infinity-tnc-divi-modules' ),
                'description'     => esc_html__( 'Use as the cursor.','infinity-tnc-divi-modules'),
				'type'            => 'text',
				'default'		  => '|',
				'toggle_slug'     => 'typing_options',
			),

            'typing_loop' => array(
				'label'             => esc_html__( 'Loop', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
                'description'       => esc_html__( 'Whether to keep looping or not.', 'infinity-tnc-divi-modules' ),
				'options'           => array(
					'on'  => esc_html__( 'ON', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'OFF', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'typing_options',
			),

		);
	}

	public function render( $attrs, $content, $render_slug ) {

        $before_text            = $this->props['before_text'];
        $after_text             = $this->props['after_text'];
        $text                   = $this->props['typing_text'];
        $typing_speed           = $this->props['typing_speed'];
        $typing_backspped       = $this->props['typing_backspeed'];
        $typing_pause           = $this->props['pause_for'];
        $typing_cursor          = $this->props['typing_cursor'];
        $typing_loop            = $this->props['typing_loop'];
		$header_level           = $this->props['title_level'];
    
           
        wp_enqueue_script('inftnc-typewriter-module');

		( 'on' === $typing_loop ) ? ( $loop_vale = true ) : ( $loop_vale = false );
	
        $typing_text = sprintf('<span class="inftnc_typewriter_text" data-initial-text="%1$s" data-initial-speed="%2$s"data-initial-backspeed="%3$s" data-initial-pause="%4$s"data-initial-cursor="%5$s"data-initial-loop="%6$s"></span>',
            /* 01 */  $text,
            /* 02 */  $typing_speed,
            /* 03 */  $typing_backspped,
            /* 05 */  $typing_pause,
            /* 06 */  $typing_cursor,
            /* 07 */  $loop_vale, 
         );
        
		$output = sprintf('

            <div class="inftnc_typewriter_wrapper">
                <%4$s class="inftnc_typewriter_main_title">
                    <span class="inftnc_before_text">%1$s</span>%3$s<span class="inftnc_after_text">%2$s</span>
                </%4$s>
            <div>

        ',
            /* 01 */  $before_text,
            /* 02 */  $after_text,
            /* 03 */  $typing_text,
			/* 04 */ et_pb_process_header_level( $header_level, 'h1' ),
        );

        return $output;
	}
}

new INFTNC_TypeWriter;


