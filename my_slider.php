<?php

/*

Plugin Name: My Slider
Plugin URI: https://akismet.com/
Description: This is simple image slider plugin.
Version: 1.0
Author: Hitesh
Author URI: https://automattic.com/wordpress-plugins/

*/

//If this file is called directly , abort.
if ( !defined( 'ABSPATH' ) ) { 
    exit; 
}

//Plugin Version Contstant
if( !defined( 'my_slider_plugin_version' )){
	define( 'my_slider_plugin_version', '1.0' );
}

//Plugin Dir Url
if( !defined( 'my_slider_dir' )){
	define( 'my_slider_dir', plugin_dir_url( __FILE__ ));
}

//Include Scripts & Styles
if( !function_exists( 'my_slider_plugin_script' )){
	function my_slider_plugin_script(){
		wp_enqueue_style('my_slider_css', my_slider_dir.'assets/css/my_slider.css');
		wp_enqueue_script('my_slider_js', my_slider_dir.'assets/js/my_slider.js', 'jQuery', '1.0', true);
	}
	add_action( 'wp_enqueue_scripts', 'my_slider_plugin_script');
}

//Include Add New Images Page
require plugin_dir_path( __FILE__).'inc/settings.php';

//Include Database File
require plugin_dir_path( __FILE__ ).'inc/db.php';


