<?php

class INFTNC_HeadingGradient extends ET_Builder_Module {

	public $slug       = 'inftnc_heading_gradient';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Heading Gradient - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );

        // Toggle settings
		$this->settings_modal_toggles  = array(
			
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Title Text', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'gradient'   => array(
						'title' => esc_html__( 'Gradient Style', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 50,
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),


            'gradient_options' => array(
				'label'           => esc_html__( 'Gradient Options', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
                'default'         => 'gradient_custom_color',
				'options'         => array(
					'gradient_custom_color'            => esc_html__( 'Custom Color', 'inftnc-infinity-tnc-divi-modules' ),
					'gradient_preset_color'            => esc_html__( 'Gradient Preset', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                
			),
	
            'gradient_type' => array(
				'label'           => esc_html__( 'Gradient Type', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'options'         => array(
					'linear-gradient'            => esc_html__( 'Linear Gradient', 'inftnc-infinity-tnc-divi-modules' ),
					'radial-gradient'            => esc_html__( 'Radial Gradient', 'inftnc-infinity-tnc-divi-modules' ),
                    'ellipse'                    => esc_html__( 'Elliptical','inftnc-infinity-tnc-divi-modules' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				)
			),

            'gradient_type' => array(
				'label'           => esc_html__( 'Position', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'options'         => array(
					'top left'                   => esc_html__( 'Top Left', 'inftnc-infinity-tnc-divi-modules' ),
					'top'                        => esc_html__( 'Top', 'inftnc-infinity-tnc-divi-modules' ),
                    'top right'                  => esc_html__( 'Top Right','inftnc-infinity-tnc-divi-modules' ),
                    'right'                      => esc_html__( 'Right','inftnc-infinity-tnc-divi-modules' ),
                    'bottom right'               => esc_html__( 'Bottom Right','inftnc-infinity-tnc-divi-modules' ),
                    'bottom'                     => esc_html__( 'Bottom','inftnc-infinity-tnc-divi-modules' ),
                    'bottom left'                => esc_html__( 'Bottom Left','inftnc-infinity-tnc-divi-modules'),
                    'left'                       => esc_html__( 'Left','inftnc-infinity-tnc-divi-modules'),
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				)
			),

            'color' => array(
                'label'           => esc_html__( 'Start Color', 'dicm-divi-custom-modules' ),
                'type'            => 'color',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				)
            ),

            'color_alpha' => array(
                'label'           => esc_html__( 'End Color', 'dicm-divi-custom-modules' ),
                'type'            => 'color',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
            ),

            'start_position' => array(
				'label'           => esc_html__( 'Start Position', 'dicm-divi-custom-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				)
			),

            'end_position' => array(
				'label'           => esc_html__( 'End Position', 'dicm-divi-custom-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'default'         => 100,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 100,
				),
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				)
			),

            'presets_gradient' => array(
				'label'           => esc_html__( 'Presets Gradient Style', 'dicm-divi-custom-modules' ),
				'type'            => 'presets_shadow',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
				'presets'         => array(
					array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p1',
							'content' => 'Hello World',
						),
						'value'   => 'preset1'
					),
                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p2',
							'content' => 'Hello World',
						),
						'value'   => 'preset2'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p3',
							'content' => 'Hello World',
						),
						'value'   => 'preset3'
					),
                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p4',
							'content' => 'Hello World',
						),
						'value'   => 'preset4'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p5',
							'content' => 'Hello World',
						),
						'value'   => 'preset5'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p6',
							'content' => 'Hello World',
						),
						'value'   => 'preset6'
					),
				),
				'default'         => 'preset1',
				'default_on_front'=> false,
                'show_if'     => array(
                    'gradient_options' => 'gradient_preset_color',
                ),
			),
            

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_HeadingGradient;



