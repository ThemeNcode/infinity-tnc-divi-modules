<?php

class INFTNC_DualButtons extends ET_Builder_Module {

	public $slug       = 'inftnc_dual_buttons';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
        // Module name
		$this->name = esc_html__( 'Dual Buttons - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
        // Module Icon
        $this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->main_css_element = '%%order_class%%';

        // Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Button Text', 'inftnc-infinity-tnc-divi-modules' ),
					'button_links'        => array(
						'sub_toggles'     => array(
							'button_left_tab' => array(
								'name' => esc_html__( 'Button Left', 'inftnc-infinity-tnc-divi-modules' ),
							),
							'button_right_tab' => array(
								'name' => esc_html__( 'Button Right', 'inftnc-infinity-tnc-divi-modules' ),
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Button Links', 'inftnc-infinity-tnc-divi-modules' ),
					),
				),
			),
            'advanced' => array(
				'toggles' => array(
					'alignment' => esc_html__( 'Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),
		);

        // Add Custom CSS
		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Button Left', 'inftnc-infinity-tnc-divi-modules' ),
				'selector' => '.et_pb_button',
			),
			'button' => array(
				'label'    => esc_html__( 'Button Right', 'inftnc-infinity-tnc-divi-modules' ),
				'selector' => '.et_pb_button',
			),
		);

        
	} 

	public function get_fields() {
		return array(
			'button_left_text' => array(
				'label'           => esc_html__( 'Button Left Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),
            'button_right_text' => array(
				'label'           => esc_html__( 'Button Right Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'button_url_left' => array(
				'label'           => esc_html__( 'Button Link URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_left_tab'
			),

            'button_url_right' => array(
				'label'           => esc_html__( 'Button Link URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_right_tab'
			),

            'button_url_left_new_window' => array(
				'default'         => 'off',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Button Link Target', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'inftnc-infinity-tnc-divi-modules' ),
					'on'  => esc_html__( 'In The New Tab', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_left_tab',
				'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'inftnc-infinity-tnc-divi-modules' ),
			),
            'button_url_right_new_window' => array(
				'default'         => 'off',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Button Link Target', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'inftnc-infinity-tnc-divi-modules' ),
					'on'  => esc_html__( 'In The New Tab', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_right_tab',
				'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'inftnc-infinity-tnc-divi-modules' ),
			),
            'button_alignment' => array(
				'label'           => esc_html__( 'Button Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				'description'     => esc_html__( 'Align your button to the left, right or center of the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can define the alignment of Button', 'inftnc-infinity-tnc-divi-modules' ),
				'mobile_options'  => true,
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
        return array (
            'borders'         => array(
                'default' => false,
            ),
            'button'          => array(
                'button_left' => array(
                    'label'          => esc_html__('Button Left', 'inftnc-infinity-tnc-divi-modules'),
                    'css'            => array(
                        'main'         => $this->main_css_element,
                        'limited_main' => "{$this->main_css_element}.et_pb_button",
                    ),
                    'box_shadow'     => false,
                    'margin_padding' => false,
                ),

                'button_right' => array(
                    'label'          => esc_html__('Button Right', 'inftnc-infinity-tnc-divi-modules'),
                    'css'            => array(
                        'main'         => $this->main_css_element,
                        'limited_main' => "{$this->main_css_element}.et_pb_button",
                    ),
                    'box_shadow'     => false,
                    'margin_padding' => false, 
                ),
            ),
            'margin_padding'  => array(
                'css' => array(
                    'padding'   => "{$this->main_css_element}_wrapper {$this->main_css_element}, {$this->main_css_element}_wrapper {$this->main_css_element}:hover",
                    'margin'    => "{$this->main_css_element}_wrapper",
                    'important' => 'all',
                ),
            ),
            'text'            => array(
                'use_text_orientation'  => false,
                'use_background_layout' => true,
                'options'               => array(
                    'background_layout' => array(
                        'default_on_front' => 'light',
                        'hover'            => 'tabs',
                    ),
                ),
            ),
            'text_shadow'     => array(
                // Text Shadow settings are already included on button's advanced style
                'default' => false,
            ),
            'background'      => false,
            'fonts'           => false,
            'max_width'       => false,
            'height'          => false,
            'link_options'    => false,
            'position_fields' => array(
                'css' => array(
                    'main' => "{$this->main_css_element}_wrapper",
                ),
            ),
            'transform'       => array(
                'css' => array(
                    'main' => "{$this->main_css_element}_wrapper",
                ),
            ),
        );
       
    }

    

	public function render( $attrs, $content = null, $render_slug ) {
		$output = sprintf( '<h1>%1$s</h1>','Output');
        return $output;
	}

    
}

new INFTNC_DualButtons;
