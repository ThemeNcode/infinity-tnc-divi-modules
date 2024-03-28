<?php

class ImageCarousel extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug       = 'inftnc_image_carousel';

	// Full Visual Builder support
	public $vb_support = 'on';

	// Module item's slug
	public $child_slug = 'inftnc_image_carousel_child';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	function init() {
		// Module name
		$this->name                    = esc_html__( 'Image Carousel - Infinity TNC', 'infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->child_item_text 		   = esc_html__( 'Image', 'infinity-tnc-divi-modules' );

		// Module Icon
		// Load customized svg icon and use it on builder as module icon. If you don't have svg icon, you can use
		$this->icon_path               =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' 		 => esc_html__( 'Image General', 'infinity-tnc-divi-modules' ),
					'carousel_settings'  => esc_html__( 'Carousel Settings', 'infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'navigation'		 => esc_html__( 'Navigation', 'infinity-tnc-divi-modules'),
					'pagination' => array(
						'title'             => esc_html__('Pagination', 'infinity-tnc-divi-modules'),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'pagination_common' => array(
								'name' => esc_html__('Common', 'infinity-tnc-divi-modules'),
							),
							'pagination_active' => array(
								'name' => esc_html__('Active', 'infinity-tnc-divi-modules'),
							),
						),
					),
					'image_styles' => array(
						'title'	=>	esc_html__( 'Image', 'infinity-tnc-divi-modules' ),
						'priority' 	=>22,
					),
				),
			),
		);

		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'image' => array(
				'label'    => esc_html__( 'Image', 'infinity-tnc-divi-modules' ),
				'selector' => '.image_carousel_img',
			),
			'navigation' => array(
				'label'    => esc_html__( 'Navigation', 'infinity-tnc-divi-modules' ),
				'selector' => '.slick-inftnc-arrow',
			),
			'pagination' => array(
				'label'    => esc_html__( 'Pagination', 'infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_carousels_image_wrapper .slick-dots',
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
			'slides_to_show' => array(
				'label'           => esc_html__( 'Slides To Show', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => '3',
				'descritpion'     => esc_html__( 'Slides to show at a time', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
				'mobile_options'     => true,
				'responsive'         => true,
			),	
			
			'slides_to_scroll' => array(
				'label'           => esc_html__( 'Slides To Scroll', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default'		  => '1',
				'descritpion'     => esc_html__( 'Slides to scroll at a time', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
				'mobile_options'     => true,
				'responsive'         => true,
			),	

			'animation_speed' => array(
				'label'           => esc_html__( 'Animation Speed (ms)', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',
				'description'	  => esc_html__( 'Animation Transition speed', 'infinity-tnc-divi-module' ),
                'default'         => 300,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				),
			),

			'autoplay' => array(
				'label'             => esc_html__( 'Auto Play', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'autoplay_speed' => array(
				'label'           => esc_html__( 'Autoplay Speed (ms)', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',
                'default'         => 3000,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 10000,
					'step' => 1,
				),
			),

			'use_navigation' => array(
				'label'             => esc_html__( 'Use Navigation', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'use_pagination' => array(
				'label'             => esc_html__( 'Use Pagination', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'slide_spacing' => array(
				'label'           => esc_html__( 'Slide Spacing', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',
				'allowed_units'    => array('px'),
                'default'          => '20px',
				'default_unit'     => 'px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'     => true,
				'responsive'         => true,
			),

			'infinite' => array(
				'label'             => esc_html__( 'Infinite', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'description'       => esc_html__('Infinite Logo looping', 'infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'pause_on_hover' => array(
				'label'             => esc_html__( 'Pause On Hover', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'description'       => esc_html__('Pauses autoplay on hover', 'infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'swipe' => array(
				'label'             => esc_html__( 'Swipe', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'on',
				'description'       => esc_html__('Enables touch swipe', 'infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			'rtl' => array(
				'label'             => esc_html__( 'RTL', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'description'       => esc_html__('Change the logo direction to become right-to-left', 'infinity-tnc-divi-modules'),
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'carousel_settings',
				'tab_slug'        => 'general',
			),

			 'image_grayscale_default' => array(
				'label'             => esc_html__( 'Grayscale by Default', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
				'tab_slug'        => 'general',
			),

			'image_grayscale_hover' => array(
				'label'             => esc_html__( 'Grayscale on Hover', 'infinity-tnc-divi-modules' ),
				'type'              => 'yes_no_button',
				'default'			=> 'off',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'infinity-tnc-divi-modules' ),
					'off' => esc_html__( 'NO', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'main_content',
				'tab_slug'        => 'general',
			),	

			'image_hover' => array(
				'label'           => esc_html__( 'Image Hover Effect', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'none',
				'options'         => array(
					'none'	  	  	  => esc_html__( 'None','infinity-tnc-divi-modules'),
					'zoom_in' 		  => esc_html__( 'Zoom IN', 'infinity-tnc-divi-modules'),
					'zoom_out'  	  => esc_html__( 'Zoom Out','infinity-tnc-divi-modules'),
					'slide'      	  => esc_html__( 'Slide','infinity-tnc-divi-modules' ),
					'rotate'	  	  => esc_html__( 'Rotate','infinity-tnc-divi-modules'),
				),
				'toggle_slug'     => 'main_content',
				'tab_slug'        => 'general',
			),

			 'navigation_icon_size' => array(
				'label'           => esc_html__( 'Icon Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'navigation',
				'allowed_units'   => array('px'),
				'default_unit'    => 'px',
                'default'         => 30,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'     => true,
				'responsive'         => true,
			),

			'navigation_bg_size' => array(
				'label'           => esc_html__( 'Background Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'navigation',
				'allowed_units'    => array('px'),
				'default_unit'     => 'px',
                'default'         => 16,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'     => true,
				'responsive'         => true,
			),

			'navigation_icon_color' => array(
                'label'           => esc_html__( 'Icon Color', 'inftnc-infinity-tnc-divi-modules' ),
                'type'            => 'color',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'navigation',
				'hover'       	  => 'tabs',
            ),

			'navigation_bg_color' => array(
                'label'           => esc_html__( 'Background Color', 'inftnc-infinity-tnc-divi-modules' ),
                'type'            => 'color',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'navigation',
				'hover'       	  => 'tabs',
            ),	

			'pagination_cmn_dots_size' => array(
				'label'           => esc_html__( 'Dots Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_common',	
				'allowed_units'   => array('px'),
				'default_unit'    => 'px',
                'default'         => '40px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'     => true,
				'responsive'         => true,
			),

			'pagination_active_dots_size' => array(
				'label'           => esc_html__( 'Dots Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_active',	
				'allowed_units'   => array('px'),
				'default_unit'    => 'px',
                'default'         => '40px',
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'     => true,
				'responsive'         => true,
			),

			'pagination_cmn_dots_color' => array(
                'label'           => esc_html__( 'Dots Color', 'infinity-tnc-divi-modules' ),
                'type'            => 'color',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_common',
            ),

			'dots_alignment' => array(
				'label'           => esc_html__( 'Dots Alignment', 'infinity-tnc-divi-modules' ),
				'description'     => esc_html__( 'Align Dots to the left, right or center of the module.', 'infinity-tnc-divi-modules' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
                'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_common',
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
			'borders'        => array(
				'image'   => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => "%%order_class%% .inftnc_carousels_image_wrapper .slick-slide .image_carousel_img",
							'border_styles' => "%%order_class%% .inftnc_carousels_image_wrapper .slick-slide .image_carousel_img",
						),
					),
					'label_prefix'    => esc_html__( 'Image', 'infinity-tnc-divi-modules' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image_styles',
				),												
			),

			'box_shadow'        => array(
				'image'   => array(
					'css'             => array(
						'main' => "%%order_class%% .inftnc_carousels_image_wrapper .slick-slide .image_carousel_img",
						'overlay' => 'inset',
					),
					'label_prefix'    => esc_html__( 'Image', 'infinity-tnc-divi-modules' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image_styles',
				),			
			),

			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),

			'link_options'       => false,	
			'text'				 => false,
			'fonts'				 => false,											
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

		$slides_to_show 							= $this->props['slides_to_show'];
		$slides_to_scroll 							= $this->props['slides_to_scroll'];
		$animation_speed 							= $this->props['animation_speed'];
		$autoplay 									= $this->props['autoplay'];
		$autoplay_speed		    					= $this->props['autoplay_speed'];
		$use_navigation 							= $this->props['use_navigation'];
		$use_pagination 							= $this->props['use_pagination'];
		$infinite 									= $this->props['infinite'];
		$pause_on_hover 							= $this->props['pause_on_hover'];
		$swipe 										= $this->props['swipe'];
		$rtl 										= $this->props['rtl'];
		$slides_to_show_last_edited					= $this->props['slides_to_show_last_edited'];
		$slides_to_show_responsive_active   		= et_pb_get_responsive_status( $slides_to_show_last_edited );
		$slides_to_show_tablet						= $this->props['slides_to_show_tablet'];
		$slides_to_show_phone						= $this->props['slides_to_show_phone'];
		$slides_to_scroll_edited					= $this->props['slides_to_scroll_last_edited'];
		$slides_to_scroll_responsive_active 		= et_pb_get_responsive_status( $slides_to_scroll_edited );
		$slides_to_scroll_tablet					= $this->props['slides_to_scroll_tablet'];
		$slides_to_scroll_phone						= $this->props['slides_to_scroll_phone'];
		$dots_alignments							= $this->props['dots_alignment'];	
		$dots_alignments_edited						= $this->props['dots_alignment_last_edited'];	
		$dots_alignements_responsive_active 		= et_pb_get_responsive_status( $dots_alignments_edited );
		$dots_aligments_tablet						= $this->props['dots_alignment_tablet'];	
		$dots_aligments_phone						= $this->props['dots_alignment_phone'];
		$navigation_icon_size_last_edited   		= $this->props['navigation_icon_size_last_edited'];
		$navigation_icon_size_active 				= et_pb_get_responsive_status( $navigation_icon_size_last_edited );
		$navigation_icon_size_tablet        		= $this->props['navigation_icon_size_tablet'];
		$navigation_icon_size_phone         		= $this->props['navigation_icon_size_phone'];
		$navigation_bg_size_last_edited				= $this->props['navigation_bg_size_last_edited'];
		$navigation_bg_size_responsive_active 		= et_pb_get_responsive_status( $navigation_bg_size_last_edited );
		$navigation_bg_size_tablet					= $this->props['navigation_bg_size_tablet'];
		$navigation_bg_size_phone					= $this->props['navigation_bg_size_phone'];
		$pagination_cmn_dots_size_last_edited		= $this->props['pagination_cmn_dots_size_last_edited'];
		$pagination_cmn_dots_size_resposive         = et_pb_get_responsive_status( $pagination_cmn_dots_size_last_edited );
		$pagination_cmn_dots_size_tablet 			= $this->props['pagination_cmn_dots_size_tablet'];
		$pagination_cmn_dots_size_phone 			= $this->props['pagination_cmn_dots_size_phone'];
		$pagination_active_dots_size_last_edited	= $this->props['pagination_active_dots_size_last_edited'];
		$pagination_active_dots_size_resposive      = et_pb_get_responsive_status( $pagination_active_dots_size_last_edited );
		$pagination_active_dots_size_tablet 		= $this->props['pagination_active_dots_size_tablet'];
		$pagination_active_dots_size_phone 			= $this->props['pagination_active_dots_size_phone'];
		$slide_spacing_last_edited					= $this->props['slide_spacing_last_edited'];
		$slide_spacing_responsive_active			= et_pb_get_responsive_status( $slide_spacing_last_edited );
		$slide_spacing_tablet 						= $this->props['slide_spacing_tablet'];
		$slide_spacing_phone 						= $this->props['slide_spacing_phone'];
		$image_hover_effects					    = $this->props['image_hover'];

		( 'on' === $autoplay ) ? ( $autoplay_value = 'true' ) : ( $autoplay_value = 'false' );
		( 'on' === $use_navigation ) ? ( $navigation_value = 'true' ) : ( $navigation_value = 'false' );
		( 'on' === $use_pagination ) ? ( $pagination_value = 'true' ) : ( $pagination_value = 'false' );
		( 'on' === $infinite ) ? ( $infinite_value = 'true' ) : ( $infinite_value = 'false' );
		( 'on' === $pause_on_hover ) ? ( $pause_on_hover_value = 'true' ) : ( $pause_on_hover_value = 'false' );
		( 'on' === $swipe ) ? ( $swipe_value = 'true' ) : ( $swipe_value = 'false' );
		( 'on' === $rtl  ) ? ( $rtl_value = 'true' ) : ( $rtl_value = 'false' );
		( 'on' === $rtl  ) ? ( $dir_value = 'rtl' ) : ( $dir_value = '' );

		//Enqueue Style 
		wp_enqueue_style('slick');
		wp_enqueue_style('slick-theme');

		// Enqueue Script
		wp_enqueue_script('slick');
		wp_enqueue_script('inftnc-slick');

		// Slide Spacing 
		if( '' !== $this->props['slide_spacing'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousel_child.slick-slide',
					'declaration' => sprintf(
						'margin-left:%1$s;',
						$this->props['slide_spacing']
					),
				)
			);
		}

		// Slide Spacing 
		if( '' !== $this->props['slide_spacing'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
					'declaration' => sprintf(
						'margin-left:-%1$s;',
						$this->props['slide_spacing']
					),
				)
			);
		}

		// Navigation Icon Size 
		if( '' !== $this->props['navigation_icon_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
					'declaration' => sprintf(
						'font-size:%1$s;',
						$this->props['navigation_icon_size']
					),
				)
			);
		}

		// Navigation Icon Size 
		if( '' !== $this->props['navigation_icon_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-next:before',
					'declaration' => sprintf(
						'font-size:%1$s;',
						$this->props['navigation_icon_size']
					),
				)
			);
		}

		// Navigation Background Size
		if( '' !== $this->props['navigation_bg_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow',
					'declaration' => sprintf(
						'width:%1$s!important;height:%2$s!important;',
						$this->props['navigation_bg_size'],
						$this->props['navigation_bg_size'],
					),
				)
			);
		}


	   // Navigation Background Color 
		if( '' !== $this->props['navigation_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow',
					'declaration' => sprintf(
						'background-color:%1$s!important;',
						$this->props['navigation_bg_color'],
					),
				)
			);
		}

		// Navigation Background Color 
		if( '' !== $this->props['navigation_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow',
					'declaration' => sprintf(
						'background-color:%1$s!important;',
						$this->props['navigation_bg_color'],
					),
				)
			);
		}

		// Navigation Icon Color 
		if( '' !== $this->props['navigation_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-next:before',
					'declaration' => sprintf(
						'color:%1$s!important;',
						$this->props['navigation_icon_color'],
					),
				)
			);
		}

		// Navigation Icon Color 		
		if( '' !== $this->props['navigation_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
					'declaration' => sprintf(
						'color:%1$s!important;',
						$this->props['navigation_icon_color'],
					),
				)
			);
		}
		
		// Pagination Dots size
		if( '' !== $this->props['pagination_cmn_dots_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
					'declaration' => sprintf(
						'font-size:%1$s!important;',
						$this->props['pagination_cmn_dots_size'],
					),
				)
			);
		}

		// Pagination Dots Color 
		if( '' !== $this->props['pagination_cmn_dots_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
					'declaration' => sprintf(
						'color:%1$s!important;',
						$this->props['pagination_cmn_dots_color'],
					),
				)
			);
		}

		// Pagination Acitve Dots Size
		if( '' == $this->props['pagination_active_dots_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
					'declaration' => sprintf(
						'font-size:%1$s!important;',
						$this->props['pagination_active_dots_size'],
					),
				)
			);
		}

		// Pagination Alignment

		if( '' !== 	$dots_alignments ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
					'declaration' => sprintf(
						'display:flex;justify-content:%1$s;margin-top: 25px;',
						$dots_alignments,
					),
				)
			);
		}

		// Pagination Aligment Responsive
		if( $dots_alignements_responsive_active ) {

			if( '' !== 	$dots_aligments_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
						'declaration' => sprintf(
							'justify-content:%1$s;',
							$dots_aligments_tablet,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
					)
				);
			}

			if( '' !== 	$dots_aligments_phone ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
						'declaration' => sprintf(
							'justify-content:%1$s;',
							$dots_aligments_phone,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
					)
				);
			}
		}

		//Responsive Navigation Icon Size 

		if( $navigation_icon_size_active ) {

				// Navigation Icon Size 
				if( '' !== $navigation_icon_size_tablet ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-next:before',
							'declaration' => sprintf(
								'font-size:%1$s;',
								$navigation_icon_size_tablet
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
						)
					);
				}	

				// Navigation Icon Size 
				if( '' !== $navigation_icon_size_phone ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-next:before',
							'declaration' => sprintf(
								'font-size:%1$s;',
								$navigation_icon_size_phone
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
						)
					);
				}

				
				if( '' !== $navigation_icon_size_tablet ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
							'declaration' => sprintf(
								'font-size:%1$s;',
								$navigation_icon_size_tablet
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
						)
					);
				}

			
				if( '' !== $navigation_icon_size_phone ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
							'declaration' => sprintf(
								'font-size:%1$s;',
								$navigation_icon_size_phone
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
						)
					);
				}

		}

		//Reponsive Navigation Bg Size 
		if( $navigation_bg_size_responsive_active ) {

				if( '' !== $navigation_bg_size_tablet ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow',
							'declaration' => sprintf(
								'width:%1$s!important;height:%2$s!important;',
								$navigation_bg_size_tablet,
								$navigation_bg_size_tablet,
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
						)
					);
				}

				if( '' !== $navigation_bg_size_phone ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .slick-inftnc-arrow',
							'declaration' => sprintf(
								'width:%1$s!important;height:%2$s!important;',
								$navigation_bg_size_phone,
								$navigation_bg_size_phone,
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
						)
					);
				}
		}

		// Responsive Common Dots Size 

		if( $pagination_cmn_dots_size_resposive ){
			 
			if( '' !== $pagination_cmn_dots_size_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
						'declaration' => sprintf(
							'font-size:%1$s!important;',
							$pagination_cmn_dots_size_tablet,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
					)
				);
			}

			if( '' !== $pagination_cmn_dots_size_phone ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
						'declaration' => sprintf(
							'font-size:%1$s!important;',
							$pagination_cmn_dots_size_phone,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
					)
				);
			}
		}

		// Responsive Active Dots Size  

		if( $pagination_active_dots_size_resposive ){
			 
			if( '' !== $pagination_active_dots_size_tablet ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
						'declaration' => sprintf(
							'font-size:%1$s!important;',
							$pagination_active_dots_size_tablet,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
					)
				);
			}

			if( '' !== $pagination_active_dots_size_phone ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
						'declaration' => sprintf(
							'font-size:%1$s!important;',
							$pagination_active_dots_size_phone,
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
					)
				);
			}
		}

		// Responsive Slide Spacing 

		if( $slide_spacing_responsive_active ) {

			// Slide Spacing 
			if( '' !== $slide_spacing_tablet  ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .inftnc_carousel_child.slick-slide',
							'declaration' => sprintf(
								'margin-left:%1$s;',
								$slide_spacing_tablet 
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
						)
					);
				}

				// Slide Spacing 
				if( '' !== $slide_spacing_tablet  ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
							'declaration' => sprintf(
								'margin-left:-%1$s;',
								$slide_spacing_tablet 
							),
							'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
						)
					);
				}

			// Slide Spacing 
			if( '' !== $slide_spacing_phone  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousel_child.slick-slide',
						'declaration' => sprintf(
							'margin-left:%1$s;',
							$slide_spacing_phone 
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
					)
				);
			}

			// Slide Spacing 
			if( '' !== $slide_spacing_phone  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
						'declaration' => sprintf(
							'margin-left:-%1$s;',
							$slide_spacing_phone 
						),
						'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
					)
				);
			}
		}

		// Image Gray Scale Deafult 

		// Grayscale effect
        if ('on' === $this->props['image_grayscale_default']) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
                    'declaration' => sprintf(
                        '-webkit-filter: grayscale(100%%); filter: grayscale(100%%);
                        transition: -webkit-filter .5s ease 0s; transition: filter .5s ease 0s;'
                    ),
                )
            );
        }

        if ('on' === $this->props['image_grayscale_default']) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
                    'declaration' => sprintf(
                        '-webkit-filter: grayscale(0); filter: none;'
                    ),
                )
            );
        }

    // Logo Gray Scale By Hover 

    if( 'on' === $this->props['image_grayscale_hover'] ) {
        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
                'declaration' => sprintf(
                    '-webkit-filter: grayscale(0); filter: none; transition: -webkit-filter .5s ease 0s; transition: filter .5s ease 0s;',
                ),
            )
        );
    }

    if( 'on' === $this->props['image_grayscale_hover'] ) {
        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
                'declaration' => sprintf(
                    '-webkit-filter: grayscale(100%%); filter: grayscale(100%%);',
                ),
            )
        );
    }

    // Image Hover Effectcs

    // Zoom in effect
        if ('zoom_in' === $image_hover_effects) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
                    'declaration' => sprintf(
                        'transition: transform .5s ease 0s;
                        -webkit-transition: -webkit-transform .5s ease 0s;'
                    ),
                )
            );
        }

        if ('zoom_in' === $image_hover_effects) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
                    'declaration' => sprintf(
                        '-webkit-transform: scale(1.04);
                        -moz-transform: scale(1.04);
                        -ms-transform: scale(1.04);
                        -o-transform: scale(1.04);
                        transform: scale(1.04);'
                    ),
                )
            );
        }
        
        // Zoom out Effects 
        if ('zoom_out' === $image_hover_effects) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
                    'declaration' => sprintf(
                        'transition: transform .5s ease 0s;
                        -webkit-transition: -webkit-transform .5s ease 0s;
                        transform-origin: center center;
                        -webkit-transform-origin: center center;
                        transform: scale(1.04);
                        -webkit-transform: scale(1.04);'
                    ),
                )
            );
        }

        if ('zoom_out' === $image_hover_effects) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
                    'declaration' => sprintf(
                        'transform: scale(1);
                        -webkit-transform: scale(1);'
                    ),
                )
            );
        }

		// Image Slide  Effects

		if( 'slide' === $image_hover_effects ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
					'declaration' => sprintf(
						'margin-left: 0;',
					),
				)
			);
		}

		if( 'slide' === $image_hover_effects ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
					'declaration' => sprintf(
						'margin-left: 10px;
						-webkit-transform: scale(1.01, 1.01);
						transform: scale(1.01, 1.01);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;',
					),
				)
			);
		}
		
		 // Image Rotate  Effects

		 if( 'rotate' === $image_hover_effects ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
					'declaration' => sprintf(
						'-webkit-transform: rotate(0) scale(1);
						transform: rotate(0) scale(1);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;',
					),
				)
			);
		}

		if( 'rotate' === $image_hover_effects ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
					'declaration' => sprintf(
						'-webkit-transform: rotate(15deg) scale(1.4);
						transform: rotate(15deg) scale(1.4);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;',
					),
				)
			);
		}


		$output = sprintf(
			'<div dir="%13$s" class="inftnc_carousels_image_wrapper" data-slides-to-show="%2$s" data-slide-scroll="%3$s" data-animation-speed="%4$s" data-autoplay="%5$s" data-autoplay-speed="%6$s" data-navigation="%7$s" data-pagination="%8$s" data-infinite="%9$s" data-pause-hover="%10$s" data-swipe="%11$s" data-rtl="%12$s" data-slide-tablet="%14$s" data-slide-phone="%15$s" data-scroll-tablet="%16$s" data-scroll-phone="%17$s">%1$s</div>',
			/* 01 */ et_sanitized_previously( $this->content ),
			/* 02 */ $slides_to_show,
			/* 03 */ $slides_to_scroll,
			/* 04 */ $animation_speed,
			/* 05 */ $autoplay_value,
			/* 06 */ $autoplay_speed,
			/* 07 */ $navigation_value,
			/* 08 */ $pagination_value,
			/* 09 */ $infinite_value,
			/* 10 */ $pause_on_hover_value,
			/* 11 */ $swipe_value,
			/* 12 */ $rtl_value,
			/* 13 */ $dir_value,
			/* 14 */ $slides_to_show_tablet,
			/* 15 */ $slides_to_show_phone,
			/* 16 */ $slides_to_scroll_tablet,
			/* 17 */ $slides_to_scroll_phone	
 		);

		return  $output ;
	}
}

new ImageCarousel;

