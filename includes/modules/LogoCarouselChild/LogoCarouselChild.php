<?php
class LogoCarouselChild extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'inftnc_logo_carousel_child';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'logo_carousel';


	// Full Visual Builder support
	public $vb_support = 'on';

	function init() {
		// Module name
		$this->name             				= esc_html__( 'Logo', 'infinity-tnc-divi-modules' );
        $this->advanced_setting_title_text 		= esc_html__( 'New Logo', 'infinity-tnc-divi-modules' );
		$this->settings_text               		= esc_html__( 'Logo Carousel Settings', 'infinity-tnc-divi-modules' );


		// Toggle settings
        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Network', 'infinity-tnc-divi-modules' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
					'share_button_child'	=> array(
						'title'	=> esc_html__( 'Share Button',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 41,
					),
					'share_icon'	=> array(
						'title'	=> esc_html__( 'Share Button Icon',  'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 42,
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

		

		// Render module content
		$output = sprintf('
					<div class="inftnc_share_button">
						
			      	</div>',
					
			);

        return $output;
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}
}

new LogoCarouselChild;