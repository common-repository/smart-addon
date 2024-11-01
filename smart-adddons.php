<?php
/**
* Plugin Name:Smart Addons
* Plugin URI:https://smartsoftcode.com/
* Description: Smart addon a elementor addon. With this addon you can add price section and service section with elementor
* Author: smartsoftcode
* Author URI: https://profiles.wordpress.org/smartsoftcode/
* Tested up to: 5.3
* Layers Plugin: True
* version:1.0
* Layers Required Version: 1.0
*License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * License: GPL2
 * text domain name:smart-addon
 * Copyright 2019 by  smartsoftcode 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
**/




/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('SMART_ADDON_ROOT_PATH',plugin_dir_path(__FILE__));
define('SMART_ADDON_ROOT_URL',plugin_dir_url(__FILE__));
define('SMART_ADDON_INC',SMART_ADDON_ROOT_PATH .'/inc');
define('SMART_ADDON_frontend_CSS',SMART_ADDON_ROOT_URL .'assets/front-end/css');
define('SMART_ADDON_frontend_JS',SMART_ADDON_ROOT_URL .'assets/front-end/js');
define('SMART_ADDON_IMG',SMART_ADDON_ROOT_URL .'assets/img');
define('SMART_ADDON_ELEMENTOR',SMART_ADDON_INC .'/elementor');


/** Plugin version **/
define('SMART_ADDON_VERSION','1.0.0');



  
/**
 * Load plugin textdomain.
 */
add_action( 'plugins_loaded', 'smart_addon_textdomain' );

function smart_addon_textdomain() {
  load_plugin_textdomain( 'smart-addon', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
}


require_once SMART_ADDON_ELEMENTOR.'/class-elementor-widgets-init.php';