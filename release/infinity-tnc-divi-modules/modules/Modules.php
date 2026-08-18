<?php
/**
 * Register all modules with dependency tree.
 *
 * @package INFTNC\Modules
 * @since ??
 */

namespace INFTNC\Modules;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use INFTNC\Modules\EmbedMap\EmbedMap;
use INFTNC\Modules\VimeoVideo\VimeoVideo;
use INFTNC\Modules\YoutubeEmbed\YoutubeEmbed;
use INFTNC\Modules\HeadingGradient\HeadingGradient;
use INFTNC\Modules\BreadCrumbs\BreadCrumbs;
use INFTNC\Modules\TypeWriter\TypeWriter;
use INFTNC\Modules\StarRating\StarRating;
use INFTNC\Modules\DualButton\DualButton;
use INFTNC\Modules\SocialShare\SocialShare;
use INFTNC\Modules\SocialShareChild\SocialShareChild;
use INFTNC\Modules\ImageCarousel\ImageCarousel;
use INFTNC\Modules\ImageCarouselChild\ImageCarouselChild;
use INFTNC\Modules\LogoCarousel\LogoCarousel;
use INFTNC\Modules\LogoCarouselChild\LogoCarouselChild;
use INFTNC\Modules\Conversion\ValueExpansion;

/**
 * Register Divi 4 -> Divi 5 value expansion callbacks.
 *
 * The Social Share modules store their share-button padding as a single combined
 * string in Divi 4 but as four separate attributes in Divi 5. Divi resolves the
 * names below to these callables while converting, letting them expand the one
 * Divi 4 value into the four Divi 5 attributes.
 *
 * @since ??
 *
 * @param array $map Existing value expansion function map.
 *
 * @return array Modified map.
 */
function register_value_expansion_callbacks( $map ) {
	$map['inftncShareButtonPadding']      = ValueExpansion::class . '::share_button_padding';
	$map['inftncShareButtonPaddingChild'] = ValueExpansion::class . '::share_button_padding_child';

	return $map;
}
add_filter( 'divi.moduleLibrary.conversion.valueExpansionFunctionMap', __NAMESPACE__ . '\\register_value_expansion_callbacks' );

/**
 * Register all plugin modules with Divi's module dependency tree.
 *
 * @since ??
 *
 * @param object $dependency_tree Divi module dependency tree.
 *
 * @return void
 */
function register_modules_dependency_tree( $dependency_tree ) {
	$dependency_tree->add_dependency( new EmbedMap() );
	$dependency_tree->add_dependency( new VimeoVideo() );
	$dependency_tree->add_dependency( new YoutubeEmbed() );
	$dependency_tree->add_dependency( new HeadingGradient() );
	$dependency_tree->add_dependency( new BreadCrumbs() );
	$dependency_tree->add_dependency( new TypeWriter() );
	$dependency_tree->add_dependency( new StarRating() );
	$dependency_tree->add_dependency( new DualButton() );
	$dependency_tree->add_dependency( new SocialShare() );
	$dependency_tree->add_dependency( new SocialShareChild() );
	$dependency_tree->add_dependency( new ImageCarousel() );
	$dependency_tree->add_dependency( new ImageCarouselChild() );
	$dependency_tree->add_dependency( new LogoCarousel() );
	$dependency_tree->add_dependency( new LogoCarouselChild() );
}
add_action( 'divi_module_library_modules_dependency_tree', __NAMESPACE__ . '\\register_modules_dependency_tree' );
