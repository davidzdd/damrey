<?php
/**
 * hcpc重写的注册
 * 
 * @author mo
 * @date 2011-07-06
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require( dirname(__FILE__) . '/wp-load.php' );
$pageSidebarName = "注册";
$template = get_query_template('register');
if ( $template = apply_filters( 'template_include', $template ) ){
	include( $template );
}
return;
