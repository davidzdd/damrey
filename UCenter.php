<?php
/**
 * hcpc重写的前台个人中心
 * 
 * @author mo
 * @date 2011-07-06
 */

session_start();

/** Make sure that the WordPress bootstrap has run before continuing. */
require (dirname ( __FILE__ ) . '/wp-load.php');
require_once (ABSPATH . '/wp-includes/hcpc/functions.php');
require_once (ABSPATH . '/wp-includes/hcpc/UserIdentity.php');
$currentUser = UserIdentity::getLogonUser();
if (!$currentUser) {
	//如果目前处于登录状态，不允许登录
	showMessage ( '请登录后，再访问用户中心', site_url ( "/login.php" ) );
	exit(0);
} 
//默认到“备案记录”列表页中
$action = getParamFromRequest("action", "bqba");

switch ($action){
case "bqba":
	require_once (ABSPATH . '/wp-includes/hcpc/Pager.php');
	global $wpdb;
	$position = "备案记录";
	//当前申请状态状态
	$statusArr = array(-100=>array('name'=>'被删除','class'=>'c-red'),-2=>array('name'=>'终审未通过','class'=>'c-red'), -1=>array('name'=>'初审未通过','class'=>'c-purple'),0=>array('name'=>'未审','class'=>''), 1=>array('name'=>'初审完成','class'=>'c-blue'), 2=>array('name'=>'已完成','class'=>'c-green'));
	//分页器
	$pageHtml = '';
	$currentPage = getPageFromGET ();
	//前台列表的单页条数
	$maxItemPerPage = 10;
	$offset = ($currentPage - 1) * $maxItemPerPage;
	$limit = $maxItemPerPage;
	$workApplyArrDB = $wpdb->get_results($wpdb->prepare("SELECT * FROM work_reg_apply WHERE uid=%d AND status!=%d ORDER BY `created_at` DESC LIMIT %d, %d", array($currentUser->id, '-100', $offset, $limit)));
	$totalCount = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM work_reg_apply WHERE uid=%d AND status!=%d", array($currentUser->id, '-100')));
	$pageTips = '(共' . $totalCount . '条备案记录)';
	$pageHtml = Pager::getPager ( $currentPage, $totalCount, $maxItemPerPage, site_url ( '/UCenter.php?action=bqba'), $pageTips );
	//备案记录
	$template = get_query_template ( 'bqba' );
	if ($template = apply_filters ( 'template_include', $template )) {
		include ($template);
	}
	break;
case "passwd":
	//修改密码
	break;
case "info":
	//修改个人资料
	break;
}

