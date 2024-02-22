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
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'tiny_mce',
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

new INFTNC_BreadCrumbs;
