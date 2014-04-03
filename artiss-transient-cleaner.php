<?php
/*
Plugin Name: Transient Cleaner
Description: Clean expired transients from your options table
Version: 1.2.3
Author: DarkDesigns
*/

/**
* Plugin initialisation
*
* Loads the plugin's translated strings
*
* @since	1.2
*/

function atc_plugin_init() {

	$language_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages/';

	load_plugin_textdomain( 'artiss-transient-cleaner', false, $language_dir );

}

add_action( 'init', 'atc_plugin_init' );

/**
* Artiss Transient Cleaner
*
* Main code - include various functions
*
* @package	Artiss-Transient-Cleaner
* @since	1.2
*/

$functions_dir = WP_PLUGIN_DIR . '/artiss-transient-cleaner/includes/';

// Include all the various functions

include_once( $functions_dir . 'clean-transients.php' );     			// General configuration set-up

include_once( $functions_dir . 'shared-functions.php' );     			// Assorted shared functions

if ( is_admin() ) {

	include_once( $functions_dir . 'set-admin-config.php' );			// Administration configuration

}

?>