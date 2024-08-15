<?php
/*
Plugin Name: Infinity TNC Divi Modules
Plugin URI:  https://divi.themencode.com/infinity-tnc-divi-modules-preview/
Description: Fulfill your Divi experience with the awesome & useful modules for every purpose you need.
Version:     1.1.0
Author:      ThemeNcode LLC
Author URI:  https://themencode.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: infinity-tnc-divi-modules
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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

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
require_once __DIR__ ."/public/inftnc-divi-modules-public.php";





/**  
 * * Add a settings link to the plugin actions * 
 * * @param array $links Existing plugin action links.
 * @return array Modified plugin action links.
 */

function inftnc_plugin_settings_link( $links )
{
    $url = 'https://www.elegantthemes.com/marketplace/infinity-tnc-divi-modules-pro/';

    $_link = '<a href="'. esc_url($url) .'" target="_blank">' . __( 'Get Pro Version', 'infinity-tnc-divi-modules' ) . '</a>';

    $links[] = $_link;

    return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'inftnc_plugin_settings_link' );

 