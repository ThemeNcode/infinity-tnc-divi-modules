<?php
/*
Plugin Name: Infinity TNC Divi Modules
Plugin URI:  https://themencode.com/
Description: Adds a custom module to the Divi Builder
Version:     1.0.0
Author:      ThemeNcode
Author URI:  https://themencode.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: inftnc-infinity-tnc-divi-modules
Domain Path: /languages

Infinity TNC Divi Modules is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Infinity TNC Divi Modules is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Infinity TNC Divi Modules. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'inftnc_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function inftnc_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/InfinityTncDiviModules.php';
}
add_action( 'divi_extensions_init', 'inftnc_initialize_extension' );
endif;
/**
 *   Includes Files  
 */
require_once __DIR__ ."/includes/admin/breadcrumbs.php";




