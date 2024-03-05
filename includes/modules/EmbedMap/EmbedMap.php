<?php

use Themencode\InftncDiviModules\AnthonyMartin\GeoLocation\GeoPoint;

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
			
			'latitude_longitude' => array(
				'label'           => esc_html__( 'Latitude & Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Latitude & Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
					'map_type'    => 'google_map',
					
				),
			),


			'openstreetmap_latitude' => array(
				'label'           => esc_html__( 'Latitude', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Latitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
					'map_type' => 'open_street_map',
				),
			),

			'openstreetmap_longtitude' => array(
				'label'           => esc_html__( 'Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
					'map_type' => 'open_street_map',
				),
			),

			'map_width' => array(
				'label'           => esc_html__( 'Width', 'dicm-divi-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'dicm-divi-custom-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),

			'map_height' => array(
				'label'           => esc_html__( 'Height', 'dicm-divi-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'dicm-divi-custom-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),


			'embed_code' => array(
				'label'           => esc_html__( 'Embed Code', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Longitude', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'emebed_code',
				),
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$source_type    		     = $this->props['source_type'];
		$map_type       		     = $this->props['map_type'];
		$latitude_logitude           = $this->props['latitude_longitude'];
		$embed_code                  = $this->props['embed_code'];
		$openstreetmap_longtitude    = $this->props['openstreetmap_longtitude'];
		$openstreetmap_latitude      = $this->props['openstreetmap_latitude'];

		$geopointA 		= new GeoPoint(23.812238958241778,90.42481753435429);
		$boundingBox    =  $geopointA->boundingBox(3, 'miles');
		$maxLatitude    =  $boundingBox->getMaxLatitude();
		$maxLongitude   =  $boundingBox->getMaxLongitude();
		$minLatitude    =  $boundingBox->getMinLatitude();
		$minLongitude   =  $boundingBox->getMinLongitude(); 
	
		if( 'emebed_code'  === $source_type  && 'google_map' === $map_type ){
			 $map = sprintf('%1$s', /* 01 */ $embed_code );
		} elseif ( 'latitude_longitude'  === $source_type  && 'google_map' === $map_type ) { 
			$map = sprintf('<iframe src = "https://maps.google.com/maps?q=%1$s&hl;z=14&amp;output=embed"></iframe>',
			 /* 01 */ $latitude_logitude,
			);
		} elseif ( 'emebed_code'  === $source_type  && 'open_street_map' === $map_type ) {

			$map = sprintf('%1$s',/* 01 */ $embed_code );

		} elseif ('latitude_longitude'  === $source_type  && 'open_street_map' === $map_type) {
			
			$map = sprintf('<iframe src="http://www.openstreetmap.org/export/embed.html?bbox=%1$s,%2$s,%3$s,%4$s&marker=%5$s,%6$s&layers=ND" frameborder="0"></iframe>',
				/* Min Latitude 01 */ $minLatitude,
				/* Min Longitude 02 */ $minLongitude,
				/* Max Longitude 03 */ $maxLongitude,
				/* Max Latitude 04 */ $maxLatitude,
				/* Marker 05 */ $openstreetmap_longtitude,
				/* Marker 06 */ $openstreetmap_latitude
			);
		}
		
		return sprintf( '<div class="inftnc_embed_map">%1$s</div>', 
		/* 01 */ $map );
	}
}

new INFTNC_EmbedMap;
