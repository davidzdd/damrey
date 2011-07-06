<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	require_once( dirname(__FILE__) . '/wp-load.php' );

	wp();
	//add by mo at 2011-07-07
	require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
	
	require_once( ABSPATH . WPINC . '/template-loader.php' );

}

?>