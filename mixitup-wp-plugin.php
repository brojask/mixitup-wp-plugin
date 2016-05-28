<?php

/**
 * Plugin Name: Mixitup Wordpress Plugin
 * Plugin URI: http://wordpress.org/plugins/mixitup-wordpress-plugin/
 * Description: MixItUp is a jQuery plugin providing animated filtering and sorting.
 * Author: Harshit gupta
 * Version: 1.0
 * Author URI: https://github.com/harshit101
 */
/**
 * @constant MIXIT_PLUGIN_PATH
 * @description Constant for plugin DIR PATH
 */
if (!defined('MIXIT_PLUGIN_PATH'))
    define('MIXIT_PLUGIN_PATH', plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'mixitup-wp-plugin';

/**
 * @constant MIXIT_PLUGIN_URL 
 * @description Constant for plugin URL
 */
if (!defined('MIXIT_PLUGIN_URL'))
    define('MIXIT_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * @constant MIXIT_PLUGIN_JS_URL 
 * @description Constant for all js directory
 */
if (!defined('MIXIT_PLUGIN_JS_URL'))
    define('MIXIT_PLUGIN_JS_URL', MIXIT_PLUGIN_URL . 'assets/js');

/**
 * @constant MIXIT_PLUGIN_CSS_URL 
 * @description Constant for all css directory
 */
if (!defined('MIXIT_PLUGIN_CSS_URL'))
    define('MIXIT_PLUGIN_CSS_URL', MIXIT_PLUGIN_URL . 'assets/css');

add_action('admin_menu', 'create_mixit_setting_page');

function create_mixit_setting_page() {
    add_options_page('Mixitup Options', 'Mixit Options', 'administrator', 'mixitup-options', 'setting_html');
    add_action('admin_init', 'register_mixit_options');
}

function setting_html() {
    include_once MIXIT_PLUGIN_PATH . 'inc/options.php';
}

function register_mixit_options() {
    register_setting('mixit-options-group', 'mixit_json_options');
}

/**
 * Load CSS & JS Need
 */
include_once MIXIT_PLUGIN_PATH . 'inc/load-assets.php';

/**
 * Creating Gallery custom post type
 */
include_once MIXIT_PLUGIN_PATH . 'inc/gallery-cpt.php';

/**
 * For frontend
 */

include_once MIXIT_PLUGIN_PATH . 'inc/shortcode.php';
?>