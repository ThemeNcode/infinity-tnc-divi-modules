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
	}

	public function get_fields() {

		return array(

			'before_text' => array(
				'label'           => esc_html__( 'Before Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'toggle_slug'     => 'main_content',
			),

            'typing_text' => array(
				'label'           => esc_html__( 'Typing Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'toggle_slug'     => 'main_content',
			),

            'after_text' => array(
				'label'           => esc_html__( 'After Text', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'toggle_slug'     => 'main_content',
			),

            'typing_speed' => array(
				'label'           => esc_html__( 'Typing Speed (ms)', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'toggle_slug'     => 'typing_options',
			),

            'typing_backspeed' => array(
				'label'           => esc_html__( 'Typing BackSpeed (ms)', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
                'description'     => esc_html__( 'The BackSpeed between deleting each character.', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'typing_options',
			),

            'typing_delay' => array(
				'label'           => esc_html__( 'Back Delay (ms)', 'infinity-tnc-divi-modules' ),
                'description'     => esc_html__('The delay between deleting each character.','infinity-tnc-divi-modules'),
				'type'            => 'text',
				'toggle_slug'     => 'typing_options',
			),
            
            'pause_for' => array(
				'label'           => esc_html__( 'Pause Time (ms)', 'infinity-tnc-divi-modules' ),
                'description'     => esc_html__( 'The pause duration after a text is typed.','infinity-tnc-divi-modules'),
				'type'            => 'text',
				'toggle_slug'     => 'typing_options',
			),

            'typing_cursor' => array(
				'label'           => esc_html__( 'Cursor', 'infinity-tnc-divi-modules' ),
                'description'     => esc_html__( 'Use as the cursor.','infinity-tnc-divi-modules'),
				'type'            => 'text',
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

	public function render( $attrs, $content = null, $render_slug ) {

        $before_text            = $this->props['before_text'];
        $after_text             = $this->props['after_text'];
        $text                   = $this->props['typing_text'];
        $typing_speed           = $this->props['typing_speed'];
        $typing_backspped       = $this->props['typing_backspeed'];
        $typing_delay           = $this->props['typing_delay'];
        $typing_pause           = $this->props['pause_for'];
        $typing_cursor          = $this->props['typing_cursor'];
        $typing_loop            = $this->props['typing_loop'];
    
           
        wp_enqueue_script('inftnc-typewriter-module');

        $typing_text = sprintf('<span class="inftnc_typewriter_text" data-initial-text="%1$s" data-initial-speed="%2$s"data-initial-backspeed="%3$s" data-initial-delay="%4$s"data-initial-pause="%5$s"data-initial-cursor="%6$s"data-initial-loop="%7$s"></span>',
            /* 01 */  $text,
            /* 02 */  $typing_speed,
            /* 03 */  $typing_backspped,
            /* 04 */  $typing_delay,
            /* 05 */  $typing_pause,
            /* 06 */  $typing_cursor,
            /* 07 */  $typing_loop, 
         );
        
		$output = sprintf('

            <div class="inftnc_typewriter_wrapper">
                <h1>
                    <span class="inftnc_before_text">%1$s</span>%3$s<span class="inftnc_after_text">%2$s</span>
                </h1>
            <div>

        ',
            /* 01 */  $before_text,
            /* 02 */  $after_text,
            /* 03 */  $typing_text,
        );

        return $output;
	}
}

new INFTNC_TypeWriter;
