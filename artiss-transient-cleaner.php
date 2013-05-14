<?php
/*
Plugin Name: Artiss Transient Cleaner
Plugin URI: http://www.artiss.co.uk/transient-cleaner
Description: Clean expired transients from your options table
Version: 1.1
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	1.0
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function atc_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'artiss-transient-cleaner.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/forum">' . __( 'Support', 'artiss-transient-cleaner' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'artiss-transient-cleaner' ) . '</a>' ) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'atc_set_plugin_meta', 10, 2 );

/**
* Clean Transients
*
* Hook into scheduled deletions and clear down expired transients
*
* @since	1.0
*/

function atc_clean_transients() {

	atc_transient_delete( true );

}

add_action( 'wp_scheduled_delete', 'atc_clean_transients' );
register_activation_hook( WP_PLUGIN_DIR . "/artiss-transient-cleaner/artiss-transient-cleaner.php", 'atc_clean_transients' );

/**
* Clear Transients
*
* Hook into database upgrade and clear transients
*
* @since	1.0
*/

function atc_clear_transients() {

	atc_transient_delete( false );

}

add_action( 'after_db_upgrade', 'atc_clear_transients' );

/**
* Delete Transients
*
* Shared function that will clear down requested transients
*
* @since	1.0
*
* param		string	$expired	TRUE or FALSE, whether to delete all or expired transients
*/

function atc_transient_delete( $expired ) {

	global $_wp_using_ext_object_cache;

	if ( !$_wp_using_ext_object_cache ) {

		global $wpdb;

		// Build required SQL

		$sql = "SELECT option_name FROM $wpdb->options WHERE option_name LIKE '_transient_timeout%'";

		if ( $expired ) {
			$time = time();
			$sql .=  " AND option_value < $time";
		}

		// Get all transients

		$transients = $wpdb->get_col( $sql );

		// Loop through each transient and delete them

		foreach( $transients as $transient ) { $deletion = delete_transient( str_replace( '_transient_timeout_', '', $transient ) ); }

		// Optimize the table after the deletions

		$wpdb->query( "OPTIMIZE TABLE $wpdb->options" );
	}

}
?>