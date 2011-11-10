<?php
function menu_attach_download_info() {
    // 第一个参数'Help page'为菜单名称，第二个参数'使用帮助'为菜单标题
    // 'manage_options' 参数为用户权限
    // 'my_toplevel_page' 参数用于调用my_toplevel_page()函数，来显示菜单内容
    add_menu_page('附件下载记录', '附件下载记录', 'manage_options', __FILE__, 'page_attach_download_info');
}

function page_attach_download_info() {
	require_once (dirname ( __FILE__ ) . '/../../../wp-admin/download.php');
}

add_action('admin_menu', 'menu_attach_download_info');