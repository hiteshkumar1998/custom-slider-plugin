<?php

function my_slider_images_table(){
	global $wpdb;

	$table_name = $wpdb->prefix . "images";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  time timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  user_id mediumint(9) NOT NULL,
	  post_id mediumint(9) NOT NULL,
	  image varchar(255) DEFAULT '' NOT NULL,
	  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

register_activation_hook( __FILE__, 'my_slider_images_table' );