<!DOCTYPE HTML> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8">
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head> 
<body <?php if ( is_home() ) : ?> class='index' <?php endif; ?>>
<div id="page">
	<header id="header">
		<div id="logo">
			<a href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.jpg" alt="<?php bloginfo( 'name' ); ?>" /></a>
		</div>

		<div id="meta">
			<?php if ( is_user_logged_in() ) : ?>
				
				<a href="#">小白</a> <a href="<?php echo wp_logout_url(); ?>" title="logout">[退出]</a>
			<?php else : ?>
				<a href="<?php echo wp_login_url(); ?>" title="login">登陆</a> - <a href="<?php echo wp_login_url(); ?>" title="login">注册</a>
			<?php endif; ?>
		</div>

		<nav id="menu">
			<ul>
				<li class="home"><a href="#">首页</a></li>
				<li>
					<dl class="menu-drop">
						<dt><a href="#">办事大厅</a></dt>
						<dd>
							<a href="#">美术作品</a>
							<a href="#">美术作品</a>
							<a href="#">美术作品</a>
							<a href="#">美术作品</a>
							<a href="#">美术作品</a>
						</dd>
					</dl>
				</li>
				<li><a href="#">作品备案</a></li>
				<li><a href="#">版权贸易</a></li>
				<li><a href="#">新闻资讯</a></li>
				<li><a href="#">关于我们</a></li>
			</ul>
		</nav>
	</header>