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
				'label'           => esc_html__( 'Button URL Left', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_left_tab'
			),

            'button_url_right' => array(
				'label'           => esc_html__( 'Button URL Right', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_right_tab'
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>',);
	}
}

new INFTNC_DualButtons;
