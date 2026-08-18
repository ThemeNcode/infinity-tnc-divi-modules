<?php
/**
 * KSES sanitizer for raw embed-code fields.
 *
 * @package INFTNC\Modules\Sanitizer
 * @since ??
 */

namespace INFTNC\Modules\Sanitizer;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Sanitizes user-provided embed markup (Google Maps / YouTube / Vimeo iframes)
 * while stripping dangerous tags such as <script>.
 *
 * `wp_kses_post()` does not allow <iframe>, so on its own it would blank out
 * legitimate embeds. This extends the standard post allowlist with a tight set
 * of <iframe> attributes only — no <script>, no event handlers — so embeds keep
 * working without opening a stored-XSS hole.
 *
 * @since ??
 */
class EmbedKses {

	/**
	 * Sanitize raw embed HTML against the post allowlist plus a tight iframe rule.
	 *
	 * @since ??
	 *
	 * @param string $html Raw embed markup from a module setting.
	 *
	 * @return string Sanitized HTML.
	 */
	public static function sanitize( $html ): string {
		if ( ! is_string( $html ) || '' === $html ) {
			return '';
		}

		$allowed = wp_kses_allowed_html( 'post' );

		$allowed['iframe'] = [
			'src'             => true,
			'width'           => true,
			'height'          => true,
			'frameborder'     => true,
			'marginwidth'     => true,
			'marginheight'    => true,
			'scrolling'       => true,
			'title'           => true,
			'name'            => true,
			'id'              => true,
			'class'           => true,
			'style'           => true,
			'allow'           => true,
			'allowfullscreen' => true,
			'loading'         => true,
			'referrerpolicy'  => true,
			'sandbox'         => true,
			'role'            => true,
			'aria-hidden'     => true,
			'aria-label'      => true,
		];

		// wp_kses validates iframe src against the allowed protocols (http/https),
		// so javascript: and data: URIs are stripped.
		return wp_kses( $html, $allowed );
	}
}
