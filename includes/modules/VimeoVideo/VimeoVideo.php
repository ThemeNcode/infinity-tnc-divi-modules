<?php

class INFTNC_VimeoVideo extends ET_Builder_Module {

	public $slug       = 'inftnc_vimeo_video';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://themencode.com/',
		'author'     => 'ThemeNcode',
		'author_uri' => 'https://themencode.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Vimeo Video - Infinity TNC', 'inftnc-infinity-tnc-divi-modules' );
        $this->main_css_element = "%%order_class%%.inftnc_vimeo_video iframe";
        $this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Vimeo Video', 'inftnc-infinity-tnc-divi-modules' ),
                    'video_options' => array(
                        'title' => esc_html__( 'Video Options', 'inftnc-infinity-tnc-divi-modules' ),
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
				 'height'	=> array(
					'options' => array(
						'height' => array(
							'default'        => '500px',
							'default_tablet' => '500px',
							'default_phone'  => '500px',
						),
					),
				 ),
				 'text'     => false,
				 'fonts'	=> false,
				 'filters'  => false,
		);
   }

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'inftnc-infinity-tnc-divi-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'inftnc-infinity-tnc-divi-modules' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new INFTNC_VimeoVideo;
