<?php

class INFTNC_DualButtons extends ET_Builder_Module {

	public $slug       = 'inftnc_dual_buttons';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
        // Module name
		$this->name = esc_html__( 'Dual Buttons - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
        // Module Icon
        $this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->main_css_element = '%%order_class%%';

        // Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Button Text', 'inftnc-infinity-tnc-divi-modules' ),
					'button_links'        => array(
						'sub_toggles'     => array(
							'button_left_tab' => array(
								'name' => esc_html__( 'Button Left', 'inftnc-infinity-tnc-divi-modules' ),
							),
							'button_right_tab' => array(
								'name' => esc_html__( 'Button Right', 'inftnc-infinity-tnc-divi-modules' ),
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Button Links', 'inftnc-infinity-tnc-divi-modules' ),
					),
				),
			),
            'advanced' => array(
				'toggles' => array(
					'alignment' => esc_html__( 'Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),
		);

        // Add Custom CSS
		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Button Left', 'inftnc-infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_pb_button_right',
			),
			'button' => array(
				'label'    => esc_html__( 'Button Right', 'inftnc-infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_pb_button_right',
			),
		);

        
		// Add help videos
		// This video will be displayed on different modal if the help icon on the bottom of the modal is clicked
		$this->help_videos = array(
			array(
				'id'   => esc_html__( 'FkQuawiGWUw', 'inftnc-infinity-tnc-divi-modules' ), // YouTube video ID
				'name' => esc_html__( 'Dual Buttons Module Video', 'inftnc-infinity-tnc-divi-modules' ),
			),
		);

	} 

	/**
	 * Get button alignment.
	 *
	 * @since 3.23 Add responsive support by adding device parameter.
	 *
	 * @param  string $device Current device name.
	 * @return string         Alignment value, rtl or not.
	 */
	public function get_button_alignment( $device = 'desktop' ) {
		$suffix           = 'desktop' !== $device ? "_{$device}" : '';
		$text_orientation = isset( $this->props[ "button_alignment{$suffix}" ] ) ? $this->props[ "button_alignment{$suffix}" ] : '';

		return et_pb_get_alignment( $text_orientation );
	}


	public function get_fields() {
		return array(
			'button_left_text' => array(
				'label'           => esc_html__( 'Button Left Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default' 		  => esc_html__('Button Left', 'inftnc-infinity-tnc-divi-modules' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),
            'button_right_text' => array(
				'label'           => esc_html__( 'Button Right Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'default' 		  => esc_html__('Button Right', 'inftnc-infinity-tnc-divi-modules' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'button_url_left' => array(
				'label'           => esc_html__( 'Button Link URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_left_tab'
			),

            'button_url_right' => array(
				'label'           => esc_html__( 'Button Link URL', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input URL for your button.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_right_tab'
			),

            'button_url_left_new_window' => array(
				'default'         => 'off',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Button Link Target', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'inftnc-infinity-tnc-divi-modules' ),
					'on'  => esc_html__( 'In The New Tab', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_left_tab',
				'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'inftnc-infinity-tnc-divi-modules' ),
			),
            'button_url_right_new_window' => array(
				'default'         => 'off',
				'default_on_front'=> true,
				'label'           => esc_html__( 'Button Link Target', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'inftnc-infinity-tnc-divi-modules' ),
					'on'  => esc_html__( 'In The New Tab', 'inftnc-infinity-tnc-divi-modules' ),
				),
				'toggle_slug'     => 'button_links',
                'sub_toggle'      => 'button_right_tab',
				'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'inftnc-infinity-tnc-divi-modules' ),
			),
            'button_alignment' => array(
				'label'           => esc_html__( 'Button Alignment', 'inftnc-infinity-tnc-divi-modules' ),
				'description'     => esc_html__( 'Align your button to the left, right or center of the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can define the alignment of Button', 'inftnc-infinity-tnc-divi-modules' ),
				'mobile_options'  => true,
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
        return array (
			'borders'         => array(
				'default' => false,
			),
			'button'          => array(
				'button_left' => array(
					'label'          => esc_html__( 'Button Left','inftnc-infinity-tnc-divi-modules'),
					'css'            => array(
						 'main' 		=> '%%order_class%% .et_pb_button.inftnc_pb_button_left',
					),
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .et_pb_button.inftnc_pb_button_left',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'main'      => "%%order_class%% .et_pb_button.inftnc_pb_button_left",
							'important' => 'all',
						),
					),
				),
				'button_right' => array(
					'label'          => esc_html__( 'Button RIght','inftnc-infinity-tnc-divi-modules'),
					'css'            => array(
						'main' 		=> '%%order_class%% .et_pb_button.inftnc_pb_button_right',
					),
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .et_pb_button.inftnc_pb_button_right',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'main'      => "%%order_class%% .et_pb_button.inftnc_pb_button_right",
							'important' => 'all',
						),
					'custom_margin' => array(
						'default' => '|||20px|false|false',
					),
					),
				),
			),
			'text_shadow'     => array(
				// Text Shadow settings are already included on button's advanced style
				'default' => false,
			),
			'background'      => false,
			'fonts'           => false,
			'max_width'       => false,
			'height'          => false,
			'link_options'    => false,	
			'text'			  => false,	
        );
       
    }

	public function render_button_left() {

		  // Module specific props added on $this->get_fields()
		  $button_left_text     =  $this->props['button_left_text'];
		  $button_left_url      =  $this->props['button_url_left'];
		  $button_target_left   =  $this->props['button_url_left_new_window'];
		  $button_custom        =  $this->props['custom_button_left'];
		  $button_rel           =  $this->props['button_left_rel'];

		  $custom_icon_left_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_left_icon' );
		  $custom_icon_left        = isset( $custom_icon_left_values['desktop'] ) ? $custom_icon_left_values['desktop'] : '';
		  $custom_icon_tablet_left = isset( $custom_icon_left_values['tablet'] ) ? $custom_icon_left_values['tablet'] : '';
		  $custom_icon_phone_left  = isset( $custom_icon_left_values['phone'] ) ? $custom_icon_left_values['phone'] : '';
		  $multi_view              = et_pb_multi_view_options($this);

		  // Render Button
			$button = $this->render_button(
				array(
					'button_id'           => $this->module_id( false ),
					'button_classname'    => array('inftnc_pb_button_left'),
					'button_custom'       => $button_custom,
					'button_rel'          => $button_rel,
					'button_text'         => $button_left_text,
					'button_text_escaped' => true,
					'button_url'          => $button_left_url,
					'custom_icon'         => $custom_icon_left,
					'custom_icon_tablet'  => $custom_icon_tablet_left,
					'custom_icon_phone'   => $custom_icon_phone_left,
					'has_wrapper'         => false,
					'url_new_window'      => $button_target_left,
					'multi_view_data'     => $multi_view->render_attrs(
						array(
							'content'        => '{{button_text}}',
							'hover_selector' => '%%order_class%% .et_pb_button.inftnc_pb_button_left',
							'visibility'     => array(
								'button_text' => '__not_empty',
							),
						)
					),
				)
			);

			return $button;
	}

	public function render_button_right() {

		// Module specific props added on $this->get_fields()
		$button_right_text     =  $this->props['button_right_text'];
		$button_right_url      =  $this->props['button_url_right'];
		$button_target_right   =  $this->props['button_url_right_new_window'];
		$button_custom         =  $this->props['custom_button_right'];
		$button_rel            =  $this->props['button_right_rel'];

		$custom_icon_right_values  = et_pb_responsive_options()->get_property_values( $this->props, 'button_right_icon' );
		$custom_icon_right         = isset( $custom_icon_right_values['desktop'] ) ? $custom_icon_right_values['desktop'] : '';
		$custom_icon_tablet_right  = isset( $custom_icon_right_values['tablet'] ) ? $custom_icon_right_values['tablet'] : '';
		$custom_icon_tablet_right  = isset( $custom_icon_right_values['phone'] ) ? $custom_icon_right_values['phone'] : '';
		$multi_view                = et_pb_multi_view_options($this);

		// Render Button
		  $button = $this->render_button(
			  array(
				  'button_id'           => $this->module_id( false ),
				  'button_classname'    => array('inftnc_pb_button_right'),
				  'button_custom'       => $button_custom,
				  'button_rel'          => $button_rel,
				  'button_text'         => $button_right_text,
				  'button_text_escaped' => true,
				  'button_url'          => $button_right_url,
				  'custom_icon'         => $custom_icon_right,
				  'custom_icon_tablet'  => $custom_icon_tablet_right,
				  'custom_icon_phone'   => $custom_icon_tablet_right,
				  'has_wrapper'         => false,
				  'url_new_window'      => $button_target_right,
				  'multi_view_data'     => $multi_view->render_attrs(
				  	array(
				  		'content'        => '{{button_text}}',
				  		'hover_selector' => '%%order_class%% .et_pb_button.inftnc_pb_button_right',
				  		'visibility'     => array(
				  			'button_text' => '__not_empty',
				  		),
				  	)
				  ),
			  )
		  );

		  return $button;
  }


    
	public function render( $attrs, $content = null, $render_slug ) {
        // Module specific props added on $this->get_fields()
        $button_alignment    		   = $this->props['button_alignment'];
		$button_alignment              = $this->get_button_alignment();
		$is_button_aligment_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'button_alignment' );
		$button_alignment_tablet       = $is_button_aligment_responsive ? $this->get_button_alignment( 'tablet' ) : '';
		$button_alignment_phone        = $is_button_aligment_responsive ? $this->get_button_alignment( 'phone' ) : '';

		// Button Alignment.
		$button_alignments = array();
		if ( ! empty( $button_alignment ) ) {
			array_push( $button_alignments, sprintf( 'et_pb_button_alignment_%1$s', esc_attr( $button_alignment ) ) );
		}

		if ( ! empty( $button_alignment_tablet ) ) {
			array_push( $button_alignments, sprintf( 'et_pb_button_alignment_tablet_%1$s', esc_attr( $button_alignment_tablet ) ) );
		}

		if ( ! empty( $button_alignment_phone ) ) {
			array_push( $button_alignments, sprintf( 'et_pb_button_alignment_phone_%1$s', esc_attr( $button_alignment_phone ) ) );
		}

		$button_alignment_classes = join( ' ', $button_alignments );

		// Render module output
		$output = sprintf(
			'<div class="et_pb_button_module_wrapper %4$s_wrapper %3$s et_pb_module">
				%1$s
			    %2$s
			</div>',
			$this->render_button_left(),
			$this->render_button_right(),
			esc_attr( $button_alignment_classes ),
			esc_attr( ET_Builder_Element::get_module_order_class( $this->slug ) ),
		);
		
        return $output;
	}
    
}

new INFTNC_DualButtons;
