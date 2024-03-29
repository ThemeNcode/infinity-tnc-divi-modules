<?php

class INFTNC_EmbedMap extends ET_Builder_Module {

	public $slug       = 'inftnc_embed_map';
	public $vb_support = 'on';

	// Module Credits (Appears at the bottom of the module settings modal)
	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/', 
	);

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	
	 public function init() {
		$this->name = esc_html__('Embed Map - Infinity TNC', 'infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = "%%order_class%% .inftnc_embed_map iframe";
		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'iframe' => array(
				'label'    => esc_html__( 'Map', 'infinity-tnc-divi-modules' ),
				'selector' => 'iframe',
			),
		);

		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Embed Map', 'infinity-tnc-divi-modules' ),
				),
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
		return array(
				 'height'	=> array(
					'options' => array(
						'height' => array(
							'default'        => '400px',
							'default_tablet' => '400px',
							'default_phone'  => '400px',
						),
					),
				 ),
				 'text'     => false,
				 'fonts'	=> false,
				 'filters'  => false,
		);
   }

   /**
	 * Module's specific fields
	 * 
	 * @since 1.0.0
	 *
	 * @return array
	 */

	public function get_fields() {
		return array(
			'source_type' => array(
				'label'           => esc_html__( 'Source Type', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'	      => 'latitude_longitude',
				'options'         => array(
					'latitude_longitude'            => esc_html__( 'Latitude & Longitude', 'infinity-tnc-divi-modules' ),
					'emebed_code'           	 	=> esc_html__( 'Embed Code', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
                
			),
			
			'latitude_longitude' => array(
				'label'           => esc_html__( 'Latitude & Longitude', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => '40.658620799731196,-73.99475680760217',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Latitude & Longitude', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),

			'map_zoom' => array(
				'label'           => esc_html__( 'Zoom', 'infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'default'          => '14',
                'range_settings' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'latitude_longitude',
				),
			),

			'embed_code' => array(
				'label'           => esc_html__( 'Embed Code', 'infinity-tnc-divi-modules' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Map Longitude', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'source_type' => 'emebed_code',
				),
			),

		);
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes
	 * @param string $content     Content being processed
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string module's rendered output
	 */

	public function render( $attrs, $content, $render_slug ) {

		$source_type    		     = $this->props['source_type'];
		$latitude_logitude           = $this->props['latitude_longitude'];
		$embed_code                  = $this->props['embed_code'];
		$zoom 						 = $this->props['map_zoom'];
		
		
		if( 'emebed_code'  === $source_type ){
			 $map = sprintf('%1$s', /* 01 */ wp_kses_post_deep( $embed_code ));
		} elseif ( 'latitude_longitude'  === $source_type) { 
			$map = sprintf('<iframe src = "https://maps.google.com/maps?q=%1$s&z=%2$s&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
			 /* 01 */ esc_attr( $latitude_logitude ),
			 /* 04 */ esc_attr( $zoom ),
			);
		} 
		
		return sprintf( '<div class="inftnc_embed_map">%1$s</div>', 
		/* 01 */ $map );
	}
}

new INFTNC_EmbedMap;


