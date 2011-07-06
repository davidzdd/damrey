<?php
/**
 * hcpc重写的登录
 * 
 * @author mo
 * @date 2011-07-06
 */

//add by mo at 2011-07-07
session_start();

/** Make sure that the WordPress bootstrap has run before continuing. */
require (dirname ( __FILE__ ) . '/wp-load.php');
require_once (ABSPATH . '/wp-includes/hcpc/functions.php');
require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
UserIdentity::logout();
$redirectUrl = home_url("/");
//跳转到首页
header("Location: {$redirectUrl}");

