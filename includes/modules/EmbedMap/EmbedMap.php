<?php

class INFTNC_EmbedMap extends ET_Builder_Module {

	public $slug       = 'inftnc_embed_map';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/', 
	);

	public function init() {
		$this->name = esc_html__('Embed Map - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );

		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Embed Map', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'source_type' => array(
				'label'           => esc_html__( 'Source Type', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'emebed_code',
				'options'         => array(
					'emebed_code'           	 	=> esc_html__( 'Embed Code', 'inftnc-infinity-tnc-divi-modules' ),
					'latitude_longitude'            => esc_html__( 'Latitude & Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
                
			),
			'map_type' => array(
				'label'           => esc_html__( 'Map Type', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'google_map',
				'options'         => array(
					'google_map'           	   => esc_html__( 'Google Map', 'inftnc-infinity-tnc-divi-modules' ),
					'open_street_map'            => esc_html__( 'OpenStreetMap', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
			),

			'latitude' => array(
				'label'           => esc_html__( 'Latitude', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Google Map Latitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),

			'longitude' => array(
				'label'           => esc_html__( 'Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Google Map Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),

			'embed_code' => array(
				'label'           => esc_html__( 'Embed Code', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Google Map Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'emebed_code',
				),
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$source_type    = $this->props['source_type'];
		$map_type       = $this->props['map_type'];
		$latitude       = $this->props['latitude'];
		$longtitude     = $this->props['longitude'];
		$embed_code     = $this->props['embed_code'];

		
 
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_EmbedMap;
