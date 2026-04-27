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
	}
);
