<?php 


function register_scripts() {
    
    wp_enqueue_style('mixit', MIXIT_PLUGIN_CSS_URL . '/mixit.css');
    wp_enqueue_style('mixit-styles', MIXIT_PLUGIN_CSS_URL . '/mixit-styles.css');    

    wp_register_script('mixitup', MIXIT_PLUGIN_JS_URL . '/jquery.mixitup.js', array('jquery'), '2.1.5', true);    
    wp_register_script('mixitup-settings', MIXIT_PLUGIN_JS_URL . '/mixitup-settings.js', array('mixitup'), '1.0.0', true);    
    wp_enqueue_script('mixitup');
    wp_enqueue_script('mixitup-settings');
}

add_action('wp_enqueue_scripts', 'register_scripts');