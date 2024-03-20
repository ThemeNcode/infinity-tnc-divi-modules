<?php

class LogoCarousel extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug       = 'inftnc_logo_carousel';

	// Full Visual Builder support
	public $vb_support = 'on';

	// Module item's slug
	public $child_slug = 'inftnc_logo_carousel_child';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	function init() {
		// Module name
		$this->name                    = esc_html__( 'Logo Carousel - Infinity TNC', 'infinity-tnc-divi-modules' );
        $this->child_item_text 		   = esc_html__( 'Logo', 'infinity-tnc-divi-modules' );

		// Module Icon
		// Load customized svg icon and use it on builder as module icon. If you don't have svg icon, you can use
		$this->icon_path               =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' 		 => esc_html__( 'Logo General', 'infinity-tnc-divi-modules' ),
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
			
			'slides-to-scroll' => array(
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
				'label'           => esc_html__( 'Animation Speed', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',
				'description'	  => esc_html__( 'Animation Transition speed', 'infinity-tnc-divi-module' ),
				'allowed_units'    => array( 'ms'),
				'default_unit'     => 'ms',
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
				'label'           => esc_html__( 'Autoplay Speed', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',
				'allowed_units'    => array( 'ms'),
				'default_unit'     => 'ms',
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

			'logo_grayscale' => array(
				'label'           => esc_html__( 'Logo Gray Scale', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'deafult'		  => 'gray_scale_default',
				'options'         => array(
					'gray_scale_default' 		=> esc_html__( 'Grayscale by Default', 'infinity-tnc-divi-modules' ),
					'gray_scale_hover' 			=> esc_html__( 'Grayscale on Hover', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'        => 'main_content',
				'tab_slug'           => 'general',
			 ),

			 'navigation_icon_size' => array(
				'label'           => esc_html__( 'Icon Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'navigation',
				'allowed_units'    => array( 'px'),
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
				'default'		  => '#481CA6',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'navigation',
				'hover'       	  => 'tabs',
            ),

			'navigation_bg_color' => array(
                'label'           => esc_html__( 'Background Color', 'inftnc-infinity-tnc-divi-modules' ),
                'type'            => 'color',
				'default'		  => '#481CA6',
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

			'pagination_active_dots_size' => array(
				'label'           => esc_html__( 'Dots Size', 'infinity-tnc-divi-module' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_active',	
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

			'pagination_cmn_dots_color' => array(
                'label'           => esc_html__( 'Dots Color', 'infinity-tnc-divi-modules' ),
                'type'            => 'color',
				'default'		  => '#481CA6',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_common',
            ),

			'pagination_dots_active_color' => array(
                'label'           => esc_html__( 'Dots Color', 'infinity-tnc-divi-modules' ),
                'type'            => 'color',
				'default'		  => '#481CA6',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'pagination',
				'sub_toggle'	  => 'pagination_active',
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
			'link_options'       => false,	
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
	function render( $attrs, $content = null, $render_slug ) {

        // Remove automatically added classnames
		$output = sprintf(
			'<div class="inftnc_social_share_wrapper">%1$s</div>',
			et_sanitized_previously( $this->content )
		);

		return  $output ;
	}
}

new LogoCarousel;