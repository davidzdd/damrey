<?php
/**
 * hcpc重写的注册
 * 
 * @author mo
 * @date 2011-07-06
 */
session_start();

/** Make sure that the WordPress bootstrap has run before continuing. */
require( dirname(__FILE__) . '/wp-load.php' );
require_once (ABSPATH . '/wp-includes/hcpc/functions.php');
require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
$isPostRequest = ('POST' == $_SERVER ['REQUEST_METHOD']);
if ($isPostRequest) {
	list ( $result, $user, $dataBindType, $code, $inputPwd ) = validate ();
	if ($result) {
		$time = date('Y-m-d H:i:s', time ());
		$clientIp = bindec(decbin(ip2long ( getClientIp () )));
		$user["key"] = getUniqueId();
		$dataBindType[] = '%s';
		$user["client_ip"] = $clientIp;
		$dataBindType[] = '%d';
		$user["created_at"] = $time;
		$dataBindType[] = '%s';
		//TODO
		global $wpdb;
		$res = $wpdb->insert("user", $user, $dataBindType);
		if ($res) {
			//进行登录
			UserIdentity::authenticate($user['name'],$inputPwd);
			//success成功code
			$code = 100;
		}
	}
	$returnUrl = home_url("/");
	/**
	 * 100 => 注册成功
	 * 101 => 验证码错误
	 * 102 => 该注册名已经存在
	 * 199 => 注册失败，请你重试
	 */
	returnJsonData (array('code'=>$code, 'returnUrl'=>$returnUrl));
	

} else {
	//渲染模板
	if (UserIdentity::getLogonUser ()) {
		//如果目前处于登录状态，不允许登录
		showMessage ( '你已经处于登录状态，不能注册', home_url ( "/" ) );
	} else {
		$pageSidebarName = "注册";
		$template = get_query_template('register');
		if ( $template = apply_filters( 'template_include', $template ) ){
			include( $template );
		}
	}
}

/**
 * 验证提交的“用户注册信息”的合法性
 * 
 * @return array  array($result,$data,$code,$pwd);
 */
function validate() {
	$result = TRUE;
	$data = array();
	$dataBindType = array();
	//失败code
	$code = 199;

	$name = utf8ToGbk(getParamFromRequest ( "name" ));
	if($name){
		$nameLen = mb_strlen($name, 'gbk');
		if($nameLen<6){
			$result = FALSE;
		}else if($nameLen>20){
			$result = FALSE;
		}else{
			global $wpdb;
			$existUser = $wpdb->get_row($wpdb->prepare("SELECT * FROM user WHERE name=%s", array($name)));
			if($existUser){
				$result = FALSE;
				//user_exist code
				$code = 102;
			}else{
				$data['name'] = $name;
				$dataBindType[] = '%s';
			}
		}
	}

	$pwd = utf8ToGbk(getParamFromRequest ( "pwd" ));
	if($pwd){
		$pwdLen = mb_strlen($pwd, 'gbk');
		if($pwdLen<6 || $pwdLen>16){
			$result = FALSE;
		}else{
			$repwd = utf8ToGbk(getParamFromRequest ( "repwd" ));
			//2次输入密码不匹配
			if($repwd == $pwd){
				$data['password'] = md5($pwd);
				$dataBindType[] = '%s';
			}else{
				$result = FALSE;
			}
		}
	}
	
	$captcha = getParamFromRequest ( "captcha" );
	if($captcha){
		//TODO 验证码
		if(false)
		{
			$result = FALSE;
			//captcha_error code
			$code = 101;
		}
	}
	return array ($result, $data, $dataBindType, $code, $pwd );
}


