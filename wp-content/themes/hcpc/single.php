<?php get_header(); ?>
 	 <?php 
 	 	$post = get_queried_object();
 	 	$curCatArr = get_the_category();
		//【当前分类】访问第三级页面时，$curQueryObj需要重新设置
	    $curCat = $curCatArr[0];
	    $linkSeparator = '&nbsp;>&nbsp;';
 	 	$urlPath = get_category_parents($curCat->term_id , true, $linkSeparator, false);
		$urlPath = substr($urlPath, 0, strripos($urlPath, $linkSeparator));
 	 ?>
	 <section id="wrap">

		<?php get_sidebar(); ?>

		<div id="main">

			<div id="nav">
				<span>当前位置：</span><a href="<?php echo home_url()?>">首页</a>&nbsp;>&nbsp;<?php echo $urlPath?>&nbsp;>&nbsp;<?php echo $post->post_title?>
			</div>

			<div id="cont">

				<?php while ( have_posts() ) : the_post(); ?>
				<article class="cont-item" id="article">
					<div class="cont-hd">
						<h1><?php the_title(); ?></h1>
						<span><?php the_time('Y-m-d g:i') ?></span>
					</div>
					
					<div class="cont-bd article">

						<?php the_content(); ?>
							
					</div>	
						
				</article>
				<?php endwhile; ?>

			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>