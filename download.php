<?php
/**
 * 记录附件下载的用户信息
 * @author mo
 * @date 2011-10-19
 */
/** Make sure that the WordPress bootstrap has run before continuing. */
require (dirname ( __FILE__ ) . '/wp-load.php');
require_once (ABSPATH . '/wp-includes/hcpc/functions.php');
require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
$currentFrontUser = UserIdentity::getLogonUser();
if ( $currentFrontUser && $currentFrontUser->id>0) {
	//附件id
	$attach_id = $_REQUEST['id']?intval($_REQUEST['id']):0;
	$url = wp_get_attachment_url($attach_id);
	if($url){
		global $wpdb;
		$info["uid"] = $currentFrontUser->id;
		$dataBindType[] = '%d';
		$info["name"] = $currentFrontUser->name;
		$dataBindType[] = '%s';
		$info["attach_id"] = $attach_id;
		$dataBindType[] = '%d';
		$info["created_at"] = time();
		$dataBindType[] = '%d';
		$res = $wpdb->insert("attach_download_info", $info, $dataBindType);
		Header("HTTP/1.1 301 Moved Permanently");
		Header("Location: {$url}");
	}else{
		showMessage('系统错误，请重新尝试');
	}
	exit;
}else{
	showMessage('登录后，方可进行附件下载！', home_url ( "/login.php" ));
	exit;
}

