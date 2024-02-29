<?php

class INFTNC_StarRating extends ET_Builder_Module {

	public $slug       = 'inftnc_star_rating';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {

		$this->name = esc_html__( 'Star Rating - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );

		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Rating', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'rating'   => array(
						'title' => esc_html__( 'Star Style', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 50,
					),
					'title'   => array(
						'title' => esc_html__( 'Title Text', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 51,
					),
					'rating_text'   => array(
						'title' => esc_html__( 'Rating Text', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 52,
					),
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
			'fonts'           => array(
				'title' => array(
					'label'          => esc_html__( 'Title Text','inftnc-infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%%',
						],
					),

					'font_size'      => array(
						'default' => '30px',
					),

					'line_height'    => array(
						'default' => '1em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),
				),

				'rating_number' => array(
					'label'          => esc_html__( 'Rating Number','inftnc-infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%%',
						],
					),

					'font_size'      => array(
						'default' => '30px',
					),

					'line_height'    => array(
						'default' => '1em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),

			'text'            => false,
			
		);
		
   }

	public function get_fields() {
		return array(

			'rating_scale' => array(
				'label'           => esc_html__( 'Rating Scale', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 5,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
				'toggle_slug'     => 'main_content',
			),
		
			'rating' => array(
				'label'           => esc_html__( 'Rating', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 5,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => .5,
				),
				'toggle_slug'     => 'main_content',
			),

			'title' => array(
				'label'           => esc_html__( 'Title', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'toggle_slug'     => 'main_content',
			),

			'show_rating_number' => array(
				'label'             => esc_html__( 'Rating Number', 'infinity' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'Show', 'inftnc-infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'Hide', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
			),

			'icon_color' => array(
				'label'           => esc_html__( 'Star Icon Color', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rating',
			),

			'star_size' => array(
				'label'           => esc_html__( 'Star Size', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rating',
			),

			'gap' => array(
				'label'           => esc_html__( 'Star Gap', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => .1,
				),
				'toggle_slug'     => 'rating',
				'tab_slug'		  => 'advanced',
			),

			

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {


		$output =  sprintf( 
			'<h1>%1$s</h1>', $this->props['content'] 
		);


		return $output;
	}
}

new INFTNC_StarRating;
