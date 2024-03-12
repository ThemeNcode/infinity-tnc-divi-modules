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
					'main_content' => esc_html__( 'Text', 'infinity-tnc-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'   => array(
						'title' => esc_html__( 'Layout', 'inftnc-infinity-tnc-divi-modules' ),
						'priority' => 50,
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
			'select' => array(
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
			'text'	=> false,
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
		// Module specific props added on $this->get_fields()
		// Render module content

        // Remove automatically added classnames
	

		$output = sprintf(
			'<div class="inftnc_social_share_wrapper">%1$s</div>',
			et_sanitized_previously( $this->content )
		);

		return  $output ;
	}
}

new SocialShare;