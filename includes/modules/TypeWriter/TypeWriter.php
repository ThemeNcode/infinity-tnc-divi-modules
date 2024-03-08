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
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_TypeWriter;