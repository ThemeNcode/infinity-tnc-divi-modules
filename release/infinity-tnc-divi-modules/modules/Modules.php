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

add_action(
	'divi_module_library_modules_dependency_tree',
	function ( $dependency_tree ) {
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
);
