<?php
/** 
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项: MySQL 设置、数据库表名前缀、
 * 密匙、WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/Editing_wp-config.php 编辑
 * wp-config.php} Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件用在于安装程序自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为 wp-config.php，然后输入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'hcpczj');

/** MySQL 数据库用户名 */
define('DB_USER', 'hcpczj');

/** MySQL 数据库密码 */
define('DB_PASSWORD', '87889048');

/** MySQL 主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份密匙设定。
 *
 * 您可以随意写一些字符
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 私钥生成服务}，
 * 任何修改都会导致 cookie 失效，所有用户必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Vb$.jLR*b{C# vXLXnekGO,7W!g(7Bn;UQ&T@?Nr{kKh|t-u^s-9D]W# *v:Q-8S');
define('SECURE_AUTH_KEY',  'vc)w%k9tLMmxzo[jE@z/F#O}A?y@Po=^}gg~`G+R0eb[FFoGN#{fQ>6o-&02fGsy');
define('LOGGED_IN_KEY',    '5^B1iv{VT*:bBVIJ$-%VMz_KpqGU/|vh><--B}SvBq]:sx/{V20,YJ^43P4sX=o0');
define('NONCE_KEY',        'TxHN5(LlW|_]~zm<%d2P)kXkm^18UfO:5:,ObFD5Eg(i$Oz`|-g,6bB7{~b 2^hF');
define('AUTH_SALT',        'K)Na@P)Lhy7xhu>gU/fNf[+#<pe6i2o>zP@~):,kqE|w<nhmewG&EhGPC*K. Xr!');
define('SECURE_AUTH_SALT', 'z>[xs%I6;L$+nPC&0`f<WS_jdE6`$T5E7MAz@h>5 zbu.UQ_n~l7$4d!J&Z2&um<');
define('LOGGED_IN_SALT',   '!iol-x$dBeu)s`:YPAn<;!7kD{jmSL;?A9Wr@H.<X^S=BGKb<>Q`je8H[lSxNSAq');
define('NONCE_SALT',       'V&:K{A0)V1D}M4n6[*;wx*E:Kn4J!))xvup0RmdjVdPb3[x^/v8ht$[n5?Duu1wv');

/**#@-*/

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置不同的数据表前缀。
 * 前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * WordPress 语言设置，默认为英语。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * wp-content/languages 内应放置同名的 .mo 语言文件。
 * 要使用 WordPress 简体中文界面，只需填入 zh_CN。
 */
define ('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为“true”，WordPress 将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用本功能。
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存该文件。使用愉快！ */

/** WordPress 目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置 WordPress 变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
