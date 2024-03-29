<?php

class INFTNC_HeadingGradient extends ET_Builder_Module {

	public $slug       = 'inftnc_heading_gradient';
	public $vb_support = 'on';
	// Module Credits (Appears at the bottom of the module settings modal)
	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$this->name = esc_html__( 'Heading Gradient - Infinity TNC', 'infinity-tnc-divi-modules' );
		//Icon 
		$this->icon_path        =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// This property will add CSS fields on Advanced > Custom CSS
		$this->custom_css_fields = array(
			'title' => array(
				'label'    => esc_html__( 'Heading Title', 'infinity-tnc-divi-modules' ),
				'selector' => '.inftnc_gradient_title',
			),
		);

        // Toggle settings
		$this->settings_modal_toggles  = array(
			
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Title Text', 'infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'gradient'   => array(
						'title' => esc_html__( 'Gradient Style', 'infinity-tnc-divi-modules' ),
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
            return array(
                'fonts'           => array(
                    'title' => array(
                        'label'          => esc_html__( 'Title','infinity-tnc-divi-modules' ),
                        'css'            => array(
                            'main' => [
                                '%%order_class%% h1.inftnc_gradient_title',
                                '%%order_class%% h2.inftnc_gradient_title',
                                '%%order_class%% h3.inftnc_gradient_title',
                                '%%order_class%% h4.inftnc_gradient_title',
                                '%%order_class%% h5.inftnc_gradient_title',
                                '%%order_class%% h6.inftnc_gradient_title',
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
                            'label'   => esc_html__( 'Heading Level', 'infinity-tnc-divi-modules' ),
                        ),
                    ),
                ),
                'background'      => array(
                    'options' => array(
                        'parallax_method' => array(
                            'default' => 'off',
                        ),
                    ),
                ),
                'margin_padding' => array(
                    'css' => array(
                        'important' => 'all',
                    ),
                ),
                'max_width'       => array(
                    'css' => array(
                        'important' => 'all',
                    ),
                ),
                'text'            => false,
                'box_shadow'      => array(
                    'default' => array(),
                ),
                'position_fields' => array(
                    'default' => 'relative',
                ),
                'link_options'    => false,
                'filters'         => false,
            );
			
    }

	/**
	 * Module's specific fields
	 * 
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_fields() {
		return array(
			'gradient_title' => array(
				'label'           => esc_html__( 'Title', 'infinity-tnc-divi-modules' ),
				'type'            => 'text',
                'default'         =>  esc_html__( 'Your Title Goes Here', 'infinity-tnc-divi-modules' ),
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),


            'gradient_options' => array(
				'label'           => esc_html__( 'Gradient Options', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
                'default'         => 'gradient_custom_color',
				'options'         => array(
					'gradient_custom_color'            => esc_html__( 'Custom Color', 'infinity-tnc-divi-modules' ),
					'gradient_preset_color'            => esc_html__( 'Gradient Preset', 'infinity-tnc-divi-modules' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                
			),
	
            'gradient_type' => array(
				'label'           => esc_html__( 'Gradient Type', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'linear_gradient',
				'options'         => array(
					'linear_gradient'            => esc_html__( 'Linear Gradient', 'infinity-tnc-divi-modules' ),
					'radial_gradient'            => esc_html__( 'Radial Gradient', 'infinity-tnc-divi-modules' ),
                    'ellipse'                    => esc_html__( 'Elliptical','infinity-tnc-divi-modules' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
			),

            'linear_position' => array (
				'label'           => esc_html__( 'Position', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'right',
				'options'         => array(
					'top left'                   => esc_html__( 'Top Left', 'infinity-tnc-divi-modules' ),
					'top'                        => esc_html__( 'Top', 'infinity-tnc-divi-modules' ),
                    'top right'                  => esc_html__( 'Top Right','infinity-tnc-divi-modules' ),
                    'right'                      => esc_html__( 'Right','infinity-tnc-divi-modules' ),
                    'bottom right'               => esc_html__( 'Bottom Right','infinity-tnc-divi-modules' ),
                    'bottom'                     => esc_html__( 'Bottom','infinity-tnc-divi-modules' ),
                    'bottom left'                => esc_html__( 'Bottom Left','infinity-tnc-divi-modules'),
                    'left'                       => esc_html__( 'Left','infinity-tnc-divi-modules'),
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_type' => 'linear_gradient',
					'gradient_options' => 'gradient_custom_color'
				),
			),

			'radial_position' => array (
				'label'           => esc_html__( 'Position', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'center center',
				'options'         => array(
					'top left'                   => esc_html__( 'Top Left', 'infinity-tnc-divi-modules' ),
					'top center'                 => esc_html__( 'Top Center', 'infinity-tnc-divi-modules' ),
                    'top right'                  => esc_html__( 'Top Right','infinity-tnc-divi-modules' ),
                    'left center'                => esc_html__( 'Left Center','infinity-tnc-divi-modules' ),
                    'center center'              => esc_html__( 'Center Center','infinity-tnc-divi-modules' ),
					'right center'				 => esc_html__( 'Right Center','infinity-tnc-divi-modules' ),
                    'bottom left'                => esc_html__( 'Bottom Left','infinity-tnc-divi-modules'),
                    'bottom right'               => esc_html__( 'Bottom Right','infinity-tnc-divi-modules'),
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_type' => 'radial_gradient',
					'gradient_options' => 'gradient_custom_color'
				),
			),

			'ellipse_position' => array (
				'label'           => esc_html__( 'Position', 'infinity-tnc-divi-modules' ),
				'type'            => 'select',
				'default'		  => 'center center',
				'options'         => array(
					'top left'                   => esc_html__( 'Top Left', 'infinity-tnc-divi-modules' ),
					'top center'                 => esc_html__( 'Top Center', 'infinity-tnc-divi-modules' ),
                    'top right'                  => esc_html__( 'Top Right','infinity-tnc-divi-modules' ),
                    'left center'                => esc_html__( 'Left Center','infinity-tnc-divi-modules' ),
					'center center'				 => esc_html__( 'Center Center','infinity-tnc-divi-modules'),
					'right center'				 => esc_html__( 'Right Center','infinity-tnc-divi-modules' ),
                    'bottom left'                => esc_html__( 'Bottom Left','infinity-tnc-divi-modules' ),
                    'bottom center'              => esc_html__( 'Bottom Center','infinity-tnc-divi-modules'),
                    'bottom right'               => esc_html__( 'Bottom Right','infinity-tnc-divi-modules'),
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_type' => 'ellipse',
					'gradient_options' => 'gradient_custom_color'
				),
			),

            'start_color' => array(
                'label'           => esc_html__( 'Start Color', 'infinity-tnc-divi-modules' ),
                'type'            => 'color',
				'default'		  => '#481CA6',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
            ),

            'end_color' => array(
                'label'           => esc_html__( 'End Color', 'infinity-tnc-divi-modules' ),
                'type'            => 'color',
				'default'		  => '#AC43D9',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient',
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
            ),

            'start_position' => array(
				'label'           => esc_html__( 'Start Position', 'infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'default'         => 0,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
			),

            'end_position' => array(
				'label'           => esc_html__( 'End Position', 'infinity-tnc-divi-modules' ),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
                'default'         => 100,
                'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
                'show_if'         => array(
					'gradient_options' => 'gradient_custom_color',
				),
			),

            'presets_gradient' => array(
				'label'           => esc_html__( 'Presets Gradient Style', 'infinity-tnc-divi-modules' ),
				'type'            => 'presets_shadow',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'gradient',
				'presets'         => array(
					array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p1',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset1'
					),
                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p2',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset2'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p3',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset3'
					),
                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p4',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset4'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p5',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset5'
					),

                    array(
						'content' => array(
							'class'   => 'preset inftnc_gradient_p6',
							'content' => 'Hello World',
						),
						'value'   => 'gradient_preset6'
					),
				),
				'default'         => 'gradient_preset1',
				'default_on_front'=> true,
                'show_if'     => array(
                    'gradient_options' => 'gradient_preset_color',
                ),
			),
        
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
	public function render( $attrs, $content, $render_slug ) {

		$gradient_title     = $this->props['gradient_title'];
		$header_level       = $this->props['title_level'];
        $gradient_options   = $this->props['gradient_options'];

		$content = sprintf(
				'<%1$s class="inftnc_gradient_title et_pb_module_header">
					%2$s
				</%1$s>',
			/* 01 */ et_pb_process_header_level( $header_level, 'h1' ),
			/* 02 */ esc_attr( $gradient_title ),
		);

       //Gradient Options
       if ( 'gradient_custom_color' === $gradient_options ) {

           //Gradient Type
           if( 'linear_gradient' === $this->props['gradient_type']  ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background: -webkit-linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							$this->props['linear_position'],
							$this->props['start_color'],
							$this->props['end_color'],
							$this->props['start_position'],
							$this->props['end_position'],
							$this->props['start_color']
						),
					)
				);
           } elseif ( 'radial_gradient' === $this->props['gradient_type']  ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:radial-gradient(circle farthest-corner at %1$s, %2$s %4$s%%, %3$s %5$s%% ) !important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							$this->props['radial_position'],
							$this->props['start_color'],
							$this->props['end_color'],
							$this->props['start_position'],
							$this->props['end_position'],
							$this->props['start_color']
						),
					)
				);

           } elseif ( 'ellipse'  === $this->props['gradient_type'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .inftnc_gradient_title',
					'declaration' => sprintf(
						'
						background:radial-gradient(ellipse farthest-corner at %1$s, %2$s %4$s%%, %3$s %5$s%% ) !important;
						-webkit-background-clip:text !important;
						-webkit-text-fill-color:transparent;
						',
						$this->props['ellipse_position'],
						$this->props['start_color'],
						$this->props['end_color'],
						$this->props['start_position'],
						$this->props['end_position'],
						$this->props['start_color']
					),
				)
			);
           }

       } elseif ( 'gradient_preset_color' === $gradient_options ) {
		 	//Gradient Preset
			
			if ( '1'  ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to right',
							'#03658C',
							'#63BBF2',
							'0',
							'100',
						),
					)
				);
				
			} elseif ( 'gradient_preset2'  ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to right',
							'#F1543F',
							'#FDC362',
							'0',
							'100',
						),
					)
				);
				

			} elseif ( 'gradient_preset3'  ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to bottom right',
							'#30303B',
							'#EAE9E7',
							'0',
							'100'
						),
					)
				);
				
			} elseif ( 'gradient_preset4'  ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to right',
							'#8C5B49',
							'#D9BBA0',
							'0',
							'100'
						),
					)
				);

			} elseif ( 'gradient_preset5'   ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to right',
							'#044D29',
							'#97ED8A',
							'0',
							'100'
						),
					)
				);

			} elseif ( 'gradient_preset6'  ===  $this->props['presets_gradient'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .inftnc_gradient_title',
						'declaration' => sprintf(
							'
							background:linear-gradient(%1$s, %2$s %4$s%%,  %3$s %5$s%% )!important;
							-webkit-background-clip:text !important;
							-webkit-text-fill-color:transparent;
							',
							'to right',
							'#481CA6',
							'#AC43D9',
							'0',
							'100'
						),
					)
				);

			}
           
       }

     $output = sprintf(
        '<div%3$s class="%2$s">
            %1$s
        </div>',
        /* 01 */ $content,
        /* 02 */ $this->module_classname( $render_slug ),
        /* 03 */ $this->module_id(),
    );

    return $output;

	}
}

new INFTNC_HeadingGradient;
