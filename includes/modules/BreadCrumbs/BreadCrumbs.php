<?php

class INFTNC_BreadCrumbs extends ET_Builder_Module {

	public $slug       = 'inftnc_bread_crumbs';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Breadcrumbs - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Breadcrumbs Text', 'inftnc-infinity-tnc-divi-modules' ),
					'icon'		   => esc_html__( 'Icon','inftnc-infinity-tnc-divi-modules'),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'home_text' => array(
				'label'           => esc_html__( 'Home', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'		  => esc_html__('Home','inftnc-infinity-tnc-divi-modules'),
				'description'     => esc_html__( 'Default home text in the Breadcrumbs', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'before_text' => array(
				'label'           => esc_html__( 'Before Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Before text in the breadcrumbs', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'select_fonticon' => array(
				'label'               => esc_html__( 'Seperator Icon', 'inftnc-infinity-tnc-divi-modules' ),
				'type'                => 'et_font_icon_select',
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'toggle_slug'         => 'icon',
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_BreadCrumbs;
