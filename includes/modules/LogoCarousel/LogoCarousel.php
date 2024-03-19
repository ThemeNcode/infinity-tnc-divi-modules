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
        $this->child_item_text 		   = esc_html__( 'Logo Carosel', 'infinity-tnc-divi-modules' );

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