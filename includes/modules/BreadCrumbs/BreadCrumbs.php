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

			'seperator_icon' => array(
				'label'               => esc_html__( 'Separator Icon', 'lwp-divi-breadcrumbs' ),
				'type'                => 'select_icon',
				'renderer'            => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'icon',
				'description'         => esc_html__( 'Choose the icon for the separator.', 'lwp-divi-breadcrumbs' ),
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		 // Module specific props added on $this->get_fields()

		 $before_text		 = $this->props['before_text'];
		 $home_text   		 = $this->props['home_text'];   
		 $separator_icon 	 = $this->props['seperator_icon'];

		 var_dump($separator_icon);

		$inftnc_breadcrumb =  infinity_tnc_breadcrumb( $home_text, $before_text, $separator_icon );
		$output =  sprintf( '<div class="inftnc_breadcrumb">%1$s</div>', $inftnc_breadcrumb );

		return $output;
	}
}

new INFTNC_BreadCrumbs;
