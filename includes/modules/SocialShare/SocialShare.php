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
		$this->name                    = esc_html__( 'Social Share', 'infinity-tnc-divi-modules' );
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
				'options'         => array(
					'icon_with_text' => esc_html__( 'Icon With Text', 'infinity-tnc-divi-modules' ),
					'only_icon'  	 => esc_html__( 'Only Icon', 'infinity-tnc-divi-modules' ),
					'only_text'      => esc_html__( 'Only Text', 'infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'layout',
				'tab_slug'        => 'advanced',
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
				'options'         => array(
					'column_one' 		=> esc_html__( '1', 'infinity-tnc-divi-modules' ),
					'column_two'  	 	=> esc_html__( '2', 'infinity-tnc-divi-modules' ),
					'column_three'      => esc_html__( '3', 'infinity-tnc-divi-modules' ),
					'column_four'       => esc_html__( '4', 'infinity-tnc-divi-modules' ),
					'column_five'       => esc_html__( '5', 'infinity-tnc-divi-modules' ),
					'column_six'        => esc_html__( '6', 'infinity-tnc-divi-modules' ),
				),
				'mobile_options'     => 'true',
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

			 'share_alignment' => array(
				'label'           => esc_html__( 'Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'description'     => esc_html__( 'Align your Share Button to the left, right or center of the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
			),

			'button_color' => array(
				'label'           => esc_html__( 'Button Color', 'dicm-divi-custom-modules' ),
				'type'            => 'color-alpha',
				'toggle_slug'     => 'share_buton',
				'tab_slug'        => 'advanced',
			),

			'button_padding' => array(
				'label'           => esc_html__( 'Button Padding', 'nftnc-infinity-tnc-divi-modules' ),
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
							'%%order_class%%',
						],
					),
	
					'font_size'      => array(
						'default' => '30px',
					),
	
					'line_height'    => array(
						'default' => '1em',
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
			
		$social_layout    		=  $this->props['button_layout'];
		$social_shape     		=  $this->props['button_shape'];
		$social_columns   		=  $this->props['columns'];
		$columns_gap 	 		=  $this->props['columns_gap'];
		$row_gap 	 			=  $this->props['row_gap'];
		$share_alignment 		=  $this->props['share_alignment'];
		$button_color			=  $this->props['button_color'];
		$button_padding 	    =  $this->props['button_padding'];

		

        // Remove automatically added classnames
		$output = sprintf(
			'<div class="inftnc_social_share_wrapper">%1$s</div>',
			et_sanitized_previously( $this->content )
		);

		return  $output ;
	}
}

new SocialShare;