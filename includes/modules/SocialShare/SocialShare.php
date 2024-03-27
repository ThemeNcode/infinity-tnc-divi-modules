<?php

class SocialShare extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug       = 'inftnc_social_share';

	// Full Visual Builder support
	public $vb_support = 'on';

	// Module item's slug
	public $child_slug = 'inftnc_social_share_child';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	function init() {
		// Module name
		$this->name                    = esc_html__( 'Social Share - Infinity TNC', 'infinity-tnc-divi-modules' );
        $this->child_item_text 		   = esc_html__( 'Social Network', 'et_builder' );

		// Module Icon
		// Load customized svg icon and use it on builder as module icon. If you don't have svg icon, you can use
		$this->icon_path               =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'   => array(
						'title' => esc_html__( 'Layout', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 40,
					),
					'share_buton'	=> array(
						'title'	=> esc_html__( 'Share Button',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 41,
					),
					'share_icon'	=> array(
						'title'	=> esc_html__( 'Share Button Icon',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 41,
					),
				),
			),
		);
	}

	/**
	 * Module's specific fields
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_fields() {
		return array(

			'button_layout' => array(
				'label'           => esc_html__( 'Button Style and Layout', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'icon_with_text',
				'options'         => array(
					'icon_with_text' => esc_html__( 'Icon With Text', 'infinity-tnc-divi-modules' ),
					'only_icon'  	 => esc_html__( 'Only Icon', 'infinity-tnc-divi-modules' ),
					'only_text'      => esc_html__( 'Only Text', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'layout',
				'tab_slug'        => 'advanced',
				'default_on_child' => true,
			),

			'button_shape' => array(
				'label'           => esc_html__( 'Button Shape', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'options'         => array(
					'button_square' 	 => esc_html__( 'Square', 'infinity-tnc-divi-modules' ),
					'button_rounded'  	 => esc_html__( 'Rounded', 'infinity-tnc-divi-modules' ),
					'button_circle'      => esc_html__( 'Circle', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'layout',
				'tab_slug'        => 'advanced',
			),

			'columns' => array(
				'label'           => esc_html__( 'Number of Columns', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'deafult'		  => 'column_auto',
				'options'         => array(
					'column_auto' 		=> esc_html__( 'Auto', 'infinity-tnc-divi-modules' ),
					'column_one' 		=> esc_html__( '1', 'infinity-tnc-divi-modules' ),
					'column_two'  	 	=> esc_html__( '2', 'infinity-tnc-divi-modules' ),
					'column_three'      => esc_html__( '3', 'infinity-tnc-divi-modules' ),
					'column_four'       => esc_html__( '4', 'infinity-tnc-divi-modules' ),
					'column_five'       => esc_html__( '5', 'infinity-tnc-divi-modules' ),
					'column_six'        => esc_html__( '6', 'infinity-tnc-divi-modules' ),
				),
				'mobile_options'     => true,
				'responsive'         => true,
				'toggle_slug'        => 'layout',
				'tab_slug'           => 'advanced',
			 ),

			 'columns_gap' => array(
				'label'           => esc_html__( 'Columns Gap', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default_unit'     => 'px',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),

			'row_gap' => array(
				'label'           => esc_html__( 'Row Gap', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'default'         => 0,
				'default_unit'     => 'px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			 ),

			'button_bg' => array(
				'label'           => esc_html__( 'Button Background Color', 'infinity-tnc-divi-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_buton',
				'tab_slug'        => 'advanced',
			),

			'icon_color' => array(
				'label'           => esc_html__( 'Icon Color', 'infinity-tnc-divi-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_icon',
				'tab_slug'        => 'advanced',
			),

			'icon_size' => array(
				'label'           => esc_html__( 'Icon Size', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_icon',
				'allowed_units'    => array('px'),
                'default'          => 16,
				'default_unit'     => 'px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			 ),

			'button_padding' => array(
				'label'           => esc_html__( 'Button Padding', 'infinity-tnc-divi-modules' ),
				'type'            => 'custom_margin',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_buton',
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
				'share_button_text' => array(
					'label'          => esc_html__( 'Share Button','infinity-tnc-divi-modules' ),
					'css'            => array(
						'main' => [
							'%%order_class%% .inftnc_social_text',
						],
					),
	
					'font_size'      => array(
						'default' => '16px',
					),

					'text_alignment'	  => false,
	
					'letter_spacing' => array(
						'default' => '0px',
					),
	
				),
			),
			'text'	     		 => false,
			'link_options'       => false,
			'filters'            => false,
		);
	}

	function before_render() {
		global $inftnc_social_share_props;
		$inftnc_social_share_props = array(
			'button_layout'              => $this->props['button_layout'],
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
	function render( $attrs, $content, $render_slug ) {
			
		$social_layout    		     =  $this->props['button_layout'];
		$social_shape     		     =  $this->props['button_shape'];
		$social_columns   			 =  $this->props['columns'];
		$columns_gap 	 			 =  $this->props['columns_gap'];
		$row_gap 	 				 =  $this->props['row_gap'];
		$button_color				 =  $this->props['button_bg'];
		$button_padding 	         =  $this->props['button_padding'];
		$column_responsive           =  $this->props['columns_last_edited'];
		$column_responsive_status    = et_pb_get_responsive_status($column_responsive);
		$column_responsive_tablet    = $this->props['columns_tablet'];
		$column_responsive_phone     = $this->props['columns_phone'];
		
		if( '' !== $this->props['button_padding'] ) {  

			$button_data = 	explode("|", $this->props["button_padding"]);
			$top = $button_data[0];
			$right = $button_data[1];
			$bottom = $button_data[2];
			$left = $button_data[3];
		}
	
		//Button Bg Color

		if( '' !== $this->props['button_bg'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							background-color:%1$s;
						',
						$this->props['button_bg'],
					),
				)
			);
		}
		
		//Icon Color 
		if( '' !== $this->props['icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_icon',
					'declaration' => sprintf(
						'color: %1$s;',
						$this->props['icon_color']
					),
				)
			);
		}
		
		//Icon Size 
		if( '' !== $this->props['icon_size'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_icon',
					'declaration' => sprintf(
						'
							font-size:%1$s;
						',
						$this->props['icon_size'],
					),
				)
			);
		}

		//Share button padding 

		if( '' !== $this->props['button_padding'] ) { 
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							padding:%1$s %2$s %3$s %4$s;
						',
						$top,
						$right,
						$bottom,
						$left
					),
				)
			);
		}

		// Social Share Button column

		if( 'column_auto' === $social_columns ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
						'declaration' => sprintf(
							'
								display:grid;
								grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
							',
							
						),
					)
				);
		 } else if ( 'column_one' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(1, 1fr);
						',
						
					),
				)
			);
		} else if ( 'column_two' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(2, 1fr);
						',
						
					),
				)
			);

		} else if ( 'column_three' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(3, 1fr);
						',
						
					),
				)
			);
		} else if ( 'column_four' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(4, 1fr);
						',
						
					),
				)
			);
		} else if ( 'column_five' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(5, 1fr);
						',
						
					),
				)
			);
		} else if ( 'column_six' === $social_columns )  {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(6, 1fr);
						',
						
					),
				)
			);
		} 

		// Social Share button shape 

		if ('button_square' === $this->props['button_shape']) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							border-radius:0px;
						',
						
					),
				)
			);
		}
		
		if ('button_rounded' === $this->props['button_shape']) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							border-radius:10px;
						',
						
					),
				)
			);

		}
		if ( 'only_icon' === $this->props['button_layout'] && 'button_circle' === $this->props['button_shape']) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
						border-radius: 100px;
						width: 45px;
						padding: 10px;
						text-align:center;
						display:unset !important; 
						',
						
					),
				)
			);
		}

		if ( 'only_icon' === $this->props['button_layout'] && 'button_circle' === $this->props['button_shape']) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_icon',
					'declaration' => sprintf(
						'
							margin-left:unset;
						',
						
					),
				)
			);
		} 

		if ( 'only_icon' === $this->props['button_layout'] && 'button_circle' === $this->props['button_shape'] &&  'column_auto' === $social_columns ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display: flex !important;
							flex-direction: row !important;
							column-gap: %1$s !important;
							row-gap: %2$s !important;
							flex-wrap: wrap !important;
						',
						$this->props['columns_gap'],
						$this->props['row_gap'],
						
					),
				)
			);
		}



		if ( 'only_text' === $this->props['button_layout'] && 'button_circle' === $this->props['button_shape']) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							border-radius:30px;

						',
						
					),
				)
			);
		}

		if ( 'icon_with_text' === $this->props['button_layout'] && 'button_circle' === $this->props['button_shape']) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_share_link',
					'declaration' => sprintf(
						'
							border-radius:30px;
						',
						
					),
				)
			);
		}

		if ( '' !== $this->props['columns_gap'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							grid-column-gap:%1$s;
						',
						$this->props['columns_gap']
					),
				)
			);
		}

		if ( '' !== $this->props['row_gap'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							grid-row-gap:%1$s;
						',
						$this->props['row_gap']
					),
				)
			);
		}

	
		//Responive  Column Layout 

		if( $column_responsive_status ) {

			// Responsive Tablet 

			if( 'column_auto' === $column_responsive_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
						'declaration' => sprintf(
							'
								display:grid;
								grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
							',
						),

						'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
					)
				);
		   }

		   if( 'column_one' === $column_responsive_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
						'declaration' => sprintf(
							'
								display:grid;
								grid-template-columns:repeat(1, 1fr);
							',
							
						),

						'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
					)
				);
		   }

		   if( 'column_two' === $column_responsive_tablet ) {
			
				ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(2, 1fr);
						',
						
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				)
			  );
		   }


		   if( 'column_three' === $column_responsive_tablet ) {
			
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(3, 1fr);
						',
						
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				)
			);
		  
	   }

		if( 'column_four' === $column_responsive_tablet ) {
					
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(4, 1fr);
						',
						
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				)
			);
			
		}

		if( 'column_five' === $column_responsive_tablet ) {
					
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(5, 1fr);
						',
						
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				)
			);
			
		}


		if( 'column_six' === $column_responsive_tablet ) {
					
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(6, 1fr);
						',
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				)
			);
			
		}

		//Responive Phone 
		if( 'column_auto' === $column_responsive_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
						',
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
				)
			);
	   }

	   if( 'column_one' === $column_responsive_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
					'declaration' => sprintf(
						'
							display:grid;
							grid-template-columns:repeat(1, 1fr);
						',
						
					),

					'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
				)
			);
	   }

	   if( 'column_two' === $column_responsive_phone ) {
		
			ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
				'declaration' => sprintf(
					'
						display:grid;
						grid-template-columns:repeat(2, 1fr);
					',
					
				),

				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			)
		  );
	   }


	   if( 'column_three' === $column_responsive_phone ) {
		
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
				'declaration' => sprintf(
					'
						display:grid;
						grid-template-columns:repeat(3, 1fr);
					',
					
				),

				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			)
		);
	  
   }

	if( 'column_four' === $column_responsive_phone ) {
				
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
				'declaration' => sprintf(
					'
						display:grid;
						grid-template-columns:repeat(4, 1fr);
					',
					
				),

				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			)
		);
		
	}

	if( 'column_five' === $column_responsive_phone ) {
				
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
				'declaration' => sprintf(
					'
						display:grid;
						grid-template-columns:repeat(5, 1fr);
					',
					
				),

				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			)
		);
		
	}


	if( 'column_six' === $column_responsive_phone ) {
				
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .inftnc_social_share_wrapper',
				'declaration' => sprintf(
					'
						display:grid;
						grid-template-columns:repeat(6, 1fr);
					',
				),

				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			)
		);
		
	}
		     
  }


        // Remove automatically added classnames
		$output = sprintf(
			'<div class="inftnc_social_share_wrapper">%1$s</div>',
			et_sanitized_previously( $this->content )
		);

		return  $output ;
	}
}

new SocialShare;