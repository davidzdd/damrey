<?php

/**
 * 用户验证--类
 */
class UserIdentity {
	
	//session里存入的key
	const SESSION_LOGIN_SYMBOL = 'loged';
	
	//cookie中自动登录的key
	const COOKIE_AUTH_ID = 'hcpc_auth';
	
	//cookie中自动登录的key，30天过期
	const COOKIE_AUTH_EXPIRETIME = 2592000;
	
	/**
	 * 用户验证
	 * 
	 * @param String $username
	 * @param String $password
	 * @param boolean $remember
	 * 
	 * @return boolean 
	 */
	public static function authenticate($username, $password, $remember = false) {
		global $wpdb;
		$symbol = FALSE;
		$user = $wpdb->get_row($wpdb->prepare("SELECT * FROM user WHERE name=%s", array($username)));
		if ($user) {
			if ($user->password == md5 ( $password )) {
				//验证通过
				$symbol = TRUE;
				//uid设置到session中
				$_SESSION [self::SESSION_LOGIN_SYMBOL] = $user->id;
				if ($remember) {
					//30天过期
					setcookie(self::COOKIE_AUTH_ID, $user->key, time()+ self::COOKIE_AUTH_EXPIRETIME, "/");
				}
			}
		}
		return $symbol;
	}
	
	/**
	 * 得到登录的用户信息（session或者cookie）
	 */
	public static function getLogonUser() {
		global $wpdb;
		$logonUser = null;
		if (isset ( $_SESSION [self::SESSION_LOGIN_SYMBOL] )) {
			$logonUid = intval ( $_SESSION [self::SESSION_LOGIN_SYMBOL] );
			$logonUser = $wpdb->get_row($wpdb->prepare("SELECT * FROM user WHERE id=%d", array($logonUid)));
		} else {
			$authKey = $_COOKIE [self::COOKIE_AUTH_ID];
			if ($authKey) {
				$logonUser = $wpdb->get_row($wpdb->prepare("SELECT * FROM user WHERE `key`=%s limit 1", $authKey));
				if ($logonUser) {
					//uid设置到session中
					$_SESSION [self::SESSION_LOGIN_SYMBOL] = $logonUser->id;
				}
			}
		}
		return $logonUser;
	}
	
	public static function isFrontLoged() {
		$currentUser = self::getLogonUser();
		if($currentUser && $currentUser->id > 0) 
			return true;
		return false;
	}
	
	public static function logout(){
		//清session
		unset($_SESSION [self::SESSION_LOGIN_SYMBOL]);
		//清cookie
		setcookie(self::COOKIE_AUTH_ID, false);
	}
}