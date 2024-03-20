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
					'navigation'		 => esc_html__( 'Navigation', 'infinity-tnc-divi-modules'),
					'pagination'		 => esc_html__( 'Pagination', 'infinity-tnc-divi-modules'),
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