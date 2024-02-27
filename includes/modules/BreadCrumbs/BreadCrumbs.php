<?php

class INFTNC_BreadCrumbs extends ET_Builder_Module {

	public $slug       = 'inftnc_bread_crumbs';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Breadcrumbs - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Breadcrumbs Text', 'inftnc-infinity-tnc-divi-modules' ),
					'icon'		   => esc_html__( 'Icon','inftnc-infinity-tnc-divi-modules'),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'breadcrumbs'   => array(
						'title' => esc_html__( 'Breadcrumbs Style', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 50,
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
        return array (			
			'text'			  => false,	
        );
       
    }

	public function get_fields() {
		return array(
			'home_text' => array(
				'label'           => esc_html__( 'Home', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'		  => esc_html__('Home','inftnc-infinity-tnc-divi-modules'),
				'description'     => esc_html__( 'Default home text in the Breadcrumbs', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'before_text' => array(
				'label'           => esc_html__( 'Before Text', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Before text in the breadcrumbs', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),

			'seperator_icon' => array(
				'label'               => esc_html__( 'Separator Icon', 'inftnc-infinity-tnc-divi-modules' ),
				'type'                => 'select_icon',
				'default'             => '&#x35;||divi',
				'renderer'            => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'icon',
				'description'         => esc_html__( 'Choose the icon for the separator.', 'inftnc-infinity-tnc-divi-modules' ),
			),

			'use_before_icon' => array(
				'label'           => esc_html__( 'Add Before Icon', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'toggle_slug'         => 'icon',					
				'options'         => array(
					'off' => esc_html__( 'No', 'inftnc-infinity-tnc-divi-modules'),
					'on'  => esc_html__( 'Yes', 'inftnc-infinity-tnc-divi-modules' ),
				),
			),

			'before_text_icon' => array(
				'label'               => esc_html__( 'Before Text Icon', 'inftnc-infinity-tnc-divi-modules' ),
				'type'                => 'select_icon',
				'default'             => '&#x35;||divi',
				'renderer'            => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'icon',
				'description'         => esc_html__( 'Choose the icon for the before text.', 'inftnc-infinity-tnc-divi-modules' ),
				'show_if'         => array(
					'use_before_icon' => 'on',
				),	
			),

			'link_color' => array(
				'label'           => esc_html__('Link Color', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'toggle_slug'     => 'breadcrumbs',
				'tab_slug'        => 'advanced',
			),

			'seperate_icon_color' => array(
				'label'           => esc_html__( 'Separator Icon Color', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'toggle_slug'     => 'breadcrumbs',
				'tab_slug'        => 'advanced',
			),

			'current_text_color' => array(
				'label'           => esc_html__( 'Current Text Color', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'color',
				'toggle_slug'     => 'breadcrumbs',
				'tab_slug'        => 'advanced',
			),

		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		// Module specific props added on $this->get_fields()
		$before_text		 = $this->props['before_text'];
		$home_text   		 = $this->props['home_text'];   
		$seperate_font 	     = $this->props['seperator_icon'];	
		$before_text_font    = $this->props['before_text_icon'];
		$use_before_icon     = $this->props['use_before_icon'];


	    $before_content= '';
		$separator_icon      = esc_attr( et_pb_process_font_icon( $seperate_font ) );
		$icon_element_selector = '%%order_class%% .inftnc_separator';
	
		// Font Icon Style Seperator.
		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'font_icon',
				'important'      => true,
				'selector'       => $icon_element_selector,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		if( $use_before_icon == 'on') {
		$before_text_icon    = esc_attr( et_pb_process_font_icon( $before_text_font ));
		$before_content.=sprintf('<span class="inftnc_before et-pb-icon">%1$s</span>',$before_text_icon);
		$before_icon_element_selector = '%%order_class%% .inftnc_before';
		// Font Icon Style Before Text.
		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'before_icon',
				'important'      => true,
				'selector'       => $before_icon_element_selector,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		}
		

		$inftnc_breadcrumb =  infinity_tnc_breadcrumb( $home_text, $before_text, $separator_icon );

		// Process link color value into style
		if ( '' !== $this->props['link_color'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .inftnc_breadcrumb a',
				'declaration' => sprintf(
					'color: %1$s;',
					esc_attr( $this->props['link_color'] )
				),
			) );
		}

		// Process seperator icon color value into style
		if ( '' !== $this->props['seperate_icon_color'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .inftnc_separator',
				'declaration' => sprintf(
					'color: %1$s;',
					esc_attr( $this->props['seperate_icon_color'] )
				),
			) );
		}

		// Process seperator icon color value into style
		if ( '' !== $this->props['current_text_color'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .inftnc_current',
				'declaration' => sprintf(
					'color: %1$s;',
					esc_attr( $this->props['current_text_color'] )
				),
			) );
		}

		$output =  sprintf( '<div class="inftnc_breadcrumb">%2$s %1$s</div>', $inftnc_breadcrumb,$before_content);

		return $output;
	}
}

new INFTNC_BreadCrumbs;
