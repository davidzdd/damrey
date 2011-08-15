<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

//add by mo at 2011-08-15 针对其他域名做跳转
$redirestHostArr = array('www.hzbq.com.cn', 'hzbq.com.cn', 'www.bqba.com.cn', 'bqba.com.cn');
if(in_array($_SERVER['HTTP_HOST'], $redirestHostArr)){
	$uri = $_SERVER['REQUEST_URI'];
	$pos = strpos($uri, '/index.php');
	if($pos==0){
		$uri = substr($uri, 10);
	}
	Header("HTTP/1.1 301 Moved Permanently");
	Header("Location: http://www.hzcopyright.com{$uri}");
	exit;
}

define('WP_USE_THEMES', true);

//add by mo at 2011-07-07
session_start();


/** Loads the WordPress Environment and Template */
require('./wp-blog-header.php');
?>