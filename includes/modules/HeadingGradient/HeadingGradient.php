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
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_HeadingGradient;
