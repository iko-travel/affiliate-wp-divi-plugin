<?php
/*
Plugin Name: iko.travel for Divi
Plugin URI:  https://iko.travel/
Description: This extension connects Divi with the iko.travel Affiliate WordPress plugin.
Version:     1.0.3
Author:      iko.travel
Author URI:  https://iko.travel/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: iktd-iko-travel-divi
Domain Path: /languages

iko.travel - Divi Integration is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

iko.travel - Divi Integration is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with iko.travel - Divi Integration. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'iktd_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function iktd_initialize_extension() {
	if (class_exists('ikoTravelElements')) {
		require_once plugin_dir_path( __FILE__ ) . 'includes/IkoTravelDivi.php';
	} else {
		
	}
}
add_action( 'divi_extensions_init', 'iktd_initialize_extension' );

add_action('admin_notices', 'ikoDiviAdminNotice' );
function ikoDiviAdminNotice() {
	if (is_admin() && !class_exists('ikoTravelElements')) {
		if ( current_user_can( 'manage_options' ) ) { // let's only show this to admin users
			$namespace = 'iko-travel';
			echo '<div class="notice notice-info"><p><b>'.
			__('Warning', $namespace).
			'!</b> '.
			__('the iko.travel - Divi Integration requires the iko.travel Affiliate WordPress plugin to be enabled',$namespace).
			'.</p>
			</div>';
		}
	}
}
endif;
