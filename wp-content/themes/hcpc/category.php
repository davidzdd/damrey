<?php get_header(); ?>
 	<?php 
		$curCat = get_queried_object();
		$childCatArr = get_terms('category',"child_of={$curCat->term_id}&hierarchical=0&hide_empty=0&orderby=slug&order=ASC");
		$linkSeparator = '&nbsp;>&nbsp;';
		$urlPath = get_category_parents($curCat->term_id , true, $linkSeparator, false);
		$urlPath = substr($urlPath, 0, strripos($urlPath, $linkSeparator));
	?>
	 <section id="wrap">
		<?php get_sidebar(); ?>
		<div id="main">
			<div id="nav">
				<span>当前位置：</span><a href="<?php echo home_url()?>">首页</a>&nbsp;>&nbsp;<?php echo $urlPath?>
			</div>
			<div id="cont">
			<?php if(is_category() && !is_wp_error($childCatArr) && count($childCatArr)>0){?>
				<?php foreach ($childCatArr as $childCat){
					if($childCat->term_id == 38){
						continue;
					}
				?>
				<div class="cont-item">
					<h1 class="cont-hd"><a href="<?php echo get_category_link($childCat->term_id)?>"><?php echo $childCat->name?></a></h1>
					<div class="cont-bd">
						<?php $curPosts = get_posts( array( 'category' => $childCat->term_id, 'numberposts'=>2 ))?>
						<?php foreach($curPosts as $post){?>
						<article class="article">
							<a href="<?php echo get_permalink($post)?>" title="<?php echo $post->post_title?>">
								<h3><?php echo $post->post_title?>
								<img src="<?php if(is_single($post)){ echo get_bloginfo( 'template_url', 'display' )."/images/folder_logo.jpg";} else {echo get_bloginfo( 'template_url', 'display' )."/images/file_logo.png";}?>" alt="<?php echo $post->post_title?>"/>
								</h3>
							</a>
							<p><?php echo htmlspecialchars(mb_substr($post->post_content,0,100)).'... ...'?></p>
							<a href="<?php echo get_permalink($post)?>" class="view-all">查看详细</a>
						</article>
						<?php }?>
					</div>
					<?php if(count($curPosts)==2){?>
						<div class="cont-ft l2"><a href="<?php echo get_category_link($childCat->term_id)?>">查看更多</a></div>
					<?php }?>
				</div>
				<?php }?>
			<?php }else{?>
				<div class="cont-item">
					<div class="cont-bd">
						<?php $posts = get_posts( array( 'category' => $curCat->term_id, 'orderby'=>'ID', 'order'=>'ASC' ))?>
						<?php foreach($posts as $post){?>
							<article class="article">
								<a href="<?php echo get_permalink($post)?>" title="<?php echo $post->post_title?>">
									<h3><?php echo $post->post_title?>
									<img src="<?php if(is_single($post)){ echo get_bloginfo( 'template_url', 'display' )."/images/folder_logo.jpg";} else {echo get_bloginfo( 'template_url', 'display' )."/images/file_logo.png";}?>" alt="<?php echo $post->post_title?>"/>
									</h3>
								</a>
								<p><?php echo htmlspecialchars(mb_substr($post->post_content,0,100)).'... ...'?></p>
								<a href="<?php echo get_permalink($post)?>" class="view-all">查看详细</a>
							</article>
						<?php }?>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>