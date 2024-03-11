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
        $this->child_item_text = esc_html__( 'Social Network', 'et_builder' );

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
			'<ul class="inftnc_social_share">%1$s</ul>',
			et_sanitized_previously( $this->content )
		);

		return  $output ;
	}
}

new SocialShare;