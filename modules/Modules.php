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

use INFTNC\Modules\StaticModule\StaticModule;
use INFTNC\Modules\D4Module\D4Module;
use INFTNC\Modules\ChildModule\ChildModule;
use INFTNC\Modules\ParentModule\ParentModule;
use INFTNC\Modules\DynamicModule\DynamicModule;
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

add_action(
	'divi_module_library_modules_dependency_tree',
	function ( $dependency_tree ) {
		$dependency_tree->add_dependency( new ParentModule() );
		$dependency_tree->add_dependency( new ChildModule() );
		$dependency_tree->add_dependency( new StaticModule() );
		$dependency_tree->add_dependency( new D4Module() );
		$dependency_tree->add_dependency( new DynamicModule() );
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
	}
);
