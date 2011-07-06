<?php
/**
 * hcpc重写的登录
 * 
 * @author mo
 * @date 2011-07-06
 */

session_start();

/** Make sure that the WordPress bootstrap has run before continuing. */
require (dirname ( __FILE__ ) . '/wp-load.php');
require_once (ABSPATH . '/wp-includes/hcpc/functions.php');
require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
$isPostRequest = ('POST' == $_SERVER ['REQUEST_METHOD']);
if ($isPostRequest) {
	//执行登录操作
	list ( $symbol, $username, $password, $remember ) = validateLoginInput ();
	if ($symbol) {
		$symbol = UserIdentity::authenticate ( $username, $password, $remember );
	}
	$returnUrl = home_url("/");
	returnJsonData(array('symbol'=>$symbol, 'returnUrl'=>$returnUrl));

} else {
	//渲染模板
	if (UserIdentity::getLogonUser ()) {
		//如果目前处于登录状态，不允许登录
		showMessage ( '你已经处于登录状态，不能重复登录', home_url ( "/" ) );
	} else {
		$pageSidebarName = "登录";
		$template = get_query_template ( 'login' );
		if ($template = apply_filters ( 'template_include', $template )) {
			include ($template);
		}
	}
}

/**
 * 验证登录提交的数据
 */
function validateLoginInput() {
	$symbol = TRUE;
	//得到输入的“登录用户名”
	$username = getParamFromRequest ( "name" );
	
	if (empty ( $username ) || ($username && mb_strlen ( $username ) > 16)) {
		$symbol = FALSE;
	}
	
	//得到输入的“登录用户名”
	$password = getParamFromRequest ( "pwd" );
	if (empty ( $password ) || ($password && mb_strlen ( $password ) > 32)) {
		$symbol = FALSE;
	}
	
	//得到输入的“登录用户名”
	$rememberBool = FALSE;
	$remember = intval ( getParamFromRequest ( "remember", 0 ) );
	if ($remember == 1) {
		$rememberBool = TRUE;
	}
	return array ($symbol, $username, $password, $rememberBool );
}


