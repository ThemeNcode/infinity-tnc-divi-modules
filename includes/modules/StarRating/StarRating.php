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
						'title' => esc_html__( 'Rating Style', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 50,
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'rating_scale' => array(
				'label'           => esc_html__( 'Rating Scale', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'linear_gradient',
				'options'         => array(
					'0-5'            => esc_html__( '0-5', 'inftnc-infinity-tnc-divi-modules' ),
					'0-10'            => esc_html__( '0-10', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
			),
			
			'rating' => array(
				'label'           => esc_html__( 'Rating', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => .1,
				),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_StarRating;
