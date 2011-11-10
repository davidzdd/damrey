<?php
/**
 * 下载信息的分页信息
 * @author mo
 * @date 2011-11-11
 */
require_once('./admin.php');
require_once('./admin-header.php');

require_once (dirname ( __FILE__ ) . '/../wp-load.php');
require_once (dirname ( __FILE__ ) . '/../wp-includes/hcpc/functions.php');
global $wpdb;
$offset = 0;
$limit = 20;
$page = getPageFromGET('mypage');
$offset = ($page - 1) * $limit;
$count = $wpdb->get_var($wpdb->prepare("SELECT count(*) FROM `attach_download_info`"));
$attachDownInfoArr = $wpdb->get_results($wpdb->prepare("SELECT * FROM `attach_download_info` ORDER BY `created_at` DESC LIMIT %d,%d", array($offset, $limit)), ARRAY_A);
//var_dump($attachDownInfo);
require_once (dirname ( __FILE__ ) . '/../wp-includes/hcpc/Pager.php');
$html = <<<EOF
	<style type="text/css">
	.page{text-align:center; margin:10px 0px}
	.page span{background-color: #CC3300; color:#FFF; padding:3px 6px}
	.page a{background-color: #68aee1; color:#FFF; padding:1px 5px}

	#page {padding:10px 0;text-align:center;}
	#page a, #page a:visited {display:inline-block;zoom:1;margin:0 3px;padding:0 6px;border:1px solid #DDD;height:21px;line-height:21px;text-decoration:none}
	#page .current, #page .current:visited {border-color:#FFF;}
	</style>
EOF;
$html .= '<div id="wpbody-content"><div class="wrap"><div class="icon32 icon32-posts-post" id="icon-edit"><br></div>';
$html .= '<h2>下载记录</h2>';
$html .= '<table class="wp-list-table widefat fixed posts" cellspacing="0"><thead><tr><th>序号</th><th>文件名称</th><th>下载人</th><th>电话</th><th>邮箱</th><th>下载时间</th></tr></thead>';
$html .= '<tbody id="the-list">';
foreach ($attachDownInfoArr as $info){
	$user = $wpdb->get_row($wpdb->prepare("SELECT * FROM user WHERE id=%d", array($info['uid'])), ARRAY_A);
	$attach = $wpdb->get_row($wpdb->prepare("SELECT * FROM wp_posts WHERE id=%d", array($info['attach_id'])), ARRAY_A);
	if($user && $attach){
		$html .= "<tr class='author-self status-publish format-default iedit' valign='top'><td>{$info['id']}</td><td>".esc_html( basename( $attach['guid'] ))."</td><td>{$user['name']}</td><td>{$user['phone']}</td><td>{$user['email']}</td><td>".date('Y-m-d m:s',$info['created_at'])."</td></tr>";
	}
}
$html .= '</tbody></table>'.Pager::getPager($page, $count, $limit, admin_url('download.php?'), '' ,'5', 'page', 'mypage').'</div><div class="clear"></div></div>';
echo $html;
include('./admin-footer.php');

