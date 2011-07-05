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
		<!-- 站点导航 -->
		<nav id="menu">
			<ul>
				<?php 
					$nav = get_post($dummy_id=7)->post_content;
					echo preg_replace_callback('/(\${catid=(\d)})/', "getListByCatId", $nav);
					
					function getListByCatId($matcher){
						$catId = $matcher[2];
						$cat = get_category($catId);
						$catUrl = get_category_link($cat);
						$realHtml = "<dl class='menu-drop'><dt><a href='{$catUrl}'>{$cat->name}</a></dt><dd>";
						$childCatArr = get_terms('category',"child_of={$cat->term_id}&hierarchical=0&hide_empty=0");
						if(!is_wp_error($childCatArr) && count($childCatArr)>0){
							foreach ($childCatArr as $childCat){
								$url = get_category_link($childCat);
								$realHtml .= "<a href='{$url}'>{$childCat->name}</a>";
							}
						}else{
							$posts = get_posts( array( 'category' => $cat->term_id ));
							foreach ($posts as $post) {
								$url = get_permalink($post);
								$realHtml .= "<a href='{$url}'>{$post->post_title}</a>";
							}
						}
						return $realHtml.'</dd></dl>';
					}
				?>
			</ul>
		</nav>
	</header>