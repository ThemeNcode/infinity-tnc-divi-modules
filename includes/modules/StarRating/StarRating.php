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
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';

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
					'label'          => esc_html__( 'Title','inftnc-infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% h1.inftnc_rating_title',
							'%%order_class%% h2.inftnc_rating_title',
							'%%order_class%% h3.inftnc_rating_title',
							'%%order_class%% h4.inftnc_rating_title',
							'%%order_class%% h5.inftnc_rating_title',
							'%%order_class%% h6.inftnc_rating_title',
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
					'header_level'   => array(
						'default' => 'h1',
						'label'   => esc_html__( 'Heading Level', 'inftnc-infinity-tnc-divi-modules' ),
					),
				),

				'rating_number' => array(
					'label'          => esc_html__( 'Rating Number','inftnc-infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% .inftnc_star_rating_number',
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

				 'text'     => false,
		);
   }

	public function get_fields() {
		return array(

			'count_star' => array(
				'label'           => esc_html__( 'Rating Scale', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
                'default'         => 5,
                'range_settings' => array(
					'min'  => 1,
					'max'  => 10,
					'step' => 1,
				),
				'toggle_slug'     => 'main_content',
			),
		
			'rating' => array(
				'label'           => esc_html__( 'Rating Value', 'inftnc-infinity-tnc-divi-modules' ),
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
				'label'             => esc_html__( 'Display Rating Value Text', 'infinity' ),
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
				'default'		  => '#AAAAAA',
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
					'max'  => 100,
					'step' => 1,
				),
				'toggle_slug'     => 'rating',
				'tab_slug'		  => 'advanced',
			),

			'star_alignment' => array(
				'label'           => esc_html__( 'Star Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				'description'     => esc_html__( 'Align your start to the left, right or center of the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'rating',
			),

			
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$rating_title     = $this->props['title']; 
		$star_count       = $this->props['count_star'];
		$rating  	      = $this->props['rating'];
		$empty_color      = $this->props['empty_color'];
		$active_color     = $this->props['icon_color'];
		$icon_size 	      = $this->props['star_size'];
		$header_level     = $this->props['title_level'];
		$star_alignment   = $this->props['star_alignment'];

		wp_enqueue_script( 'inftnc-rating-module' );

		if('on' === $this->props['show_rating_number']) {

			$rating_number = sprintf(
				'<span class="inftnc_star_rating_number">(%2$s / %1$s )</span> ',
				/** 01 */  $star_count,
				/** 02 */  $rating,
			);
	
		} else {
			$rating_number = '';
		}

		// Process Gap value into style
		if ( '' !== $this->props['gap'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .jq-star',
				'declaration' => sprintf(
					'margin-left: %1$spx !important;',
					esc_attr( $this->props['gap'] )
				),
			) );
		}
		
		$output =  sprintf( 
			'<div class="inftnc_star_rating_wrapper">
					<div class="start_rating_inner">
						<div class="inftnc_rating_title-wrap">
							<%8$s class="inftnc_rating_title">%1$s</%8$s>
					    </div>
						<div class="inftnc_rating_inner_wrapper inftnc_rating_star_alignment_%9$s">
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
			/* 08 */   et_pb_process_header_level( $header_level, 'h1' ),
			/* 09 */   $star_alignment,
		
		);
		return $output;
	}
}

new INFTNC_StarRating;
