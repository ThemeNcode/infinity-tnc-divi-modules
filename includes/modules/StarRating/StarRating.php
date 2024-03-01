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

			'count_star' => array(
				'label'           => esc_html__( 'Star', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 5,
                'range_settings' => array(
					'min'  => 1,
					'max'  => 20,
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
					'max'  => 20,
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
				'default'		  => '#EBC03F',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rating',
				
			),

			'empty_color' => array(
				'label'           => esc_html__( 'Star Icon Empty Color', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'default'		  => '#FCFBF8',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rating',
				
			),

			'star_size' => array(
				'label'           => esc_html__( 'Star Size', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 25,
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

		$rating_title = $this->props['title']; 
		$star_count   = $this->props['count_star'];
		$rating  	  = $this->props['rating'];
		$empty_color  = $this->props['empty_color'];
		$active_color  = $this->props['icon_color'];
		$icon_size 	   = $this->props['star_size'];
	
		wp_enqueue_script( 'inftnc-rating-module' );


		if('on' === $this->props['show_rating_number']) {

			$rating_number = sprintf(
				'<span class="inftnc_star_rating_number">(%2$s / %1$s )</span> ',
				/** 01 */  $star_count,
				/** 02 */  $rating,
			);
	
		}else {
			$rating_number = '';
		}
		
		$output =  sprintf( 
			'<div class="inftnc_star_rating_wrapper">
					<div class="start_rating_inner">
						<div className="inftnc_rating_title">
							<h1>%1$s</h1>
					    </div>
						<div class="inftnc_rating_inner_wrapper">
						   <div class="intftnc-rating" data-initial-rating="%2$s" data-initial-start="%3$s" data-initial-empty="%4$s" data-initial-active="%5$s" data-initial-size="%6$s"></div>
						   <div class="inftnc_rating_number_wrapper">
						 			%7$s
						   </div>
						</div>
					</div>
			</div>', 

			/* 01 */   $rating_title,
			/* 02 */   $rating,
			/* 03 */   $star_count,
			/* 04 */   $empty_color,
			/* 05 */   $active_color,
			/* 06 */   $icon_size,
			/* 07 */   $rating_number,
		
		);
		return $output;
	}
}

new INFTNC_StarRating;
