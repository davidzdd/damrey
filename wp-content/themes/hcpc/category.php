<?php get_header(); ?>
 	<?php 
		$curCat = get_queried_object();
		$childCatArr = get_terms('category',"parent={$curCat->term_id}&hierarchical=0&hide_empty=0&orderby=slug&order=ASC");
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
					<?php 
					$child2CatArr = get_terms('category',"parent={$childCat->term_id}&hierarchical=0&hide_empty=0&orderby=slug&order=ASC");
					if(!is_wp_error($child2CatArr) && count($child2CatArr)>0){
						foreach ($child2CatArr as $child2Cat){
					?>
							<article class="article">
								<a href="<?php echo get_category_link($child2Cat->term_id)?>" title="<?php echo $child2Cat->name?>">
									<h3><?php echo $child2Cat->name?>
									<img src="<?php echo get_bloginfo( 'template_url', 'display' )."/images/folder_logo.jpg"?>" alt="<?php echo $child2Cat->name?>"/>
									</h3>
								</a>
								<p><?php echo htmlspecialchars(strip_tags($child2Cat->description))?></p>
								<a href="<?php echo get_category_link($child2Cat->term_id)?>" class="view-all">查看详细</a>
							</article>
					<?php 
						}
					}else{
						$curPosts = get_posts( array( 'numberposts'=>5, 'category' => $childCat->term_id, 'orderby'=>'post_name', 'order'=>'ASC' ));
					    foreach($curPosts as $post){
					?>
							<article class="article">
								<a href="<?php echo get_permalink($post)?>" title="<?php echo $post->post_title?>">
									<h3><?php echo $post->post_title?>
									<img src="<?php echo get_bloginfo( 'template_url', 'display' )."/images/article_logo2.png";?>" alt="<?php echo $post->post_title?>"/>
									</h3>
								</a>
								<p><?php echo htmlspecialchars(mb_substr(strip_tags($post->post_content),0,100)).'... ...'?></p>
								<a href="<?php echo get_permalink($post)?>" class="view-all">查看详细</a>
							</article>
					<?php 
					    }
					}
					?>
					</div>
					<?php if(count($curPosts)==2){?>
						<div class="cont-ft l2"><a href="<?php echo get_category_link($childCat->term_id)?>">查看更多</a></div>
					<?php }?>
				</div>
				<?php }?>
			<?php }else{?>
				<div class="cont-item">
					<div class="cont-bd">
						<?php $posts = get_posts( array( 'numberposts'=>-1, 'category' => $curCat->term_id, 'orderby'=>'post_name', 'order'=>'ASC' ))?>
						<?php foreach($posts as $post){?>
							<article class="article">
								<a href="<?php echo get_permalink($post)?>" title="<?php echo $post->post_title?>">
									<h3><?php echo $post->post_title?>
									<img src="<?php echo get_bloginfo( 'template_url', 'display' )."/images/article_logo2.png";?>" alt="<?php echo $post->post_title?>"/>
									</h3>
								</a>
								<p><?php echo htmlspecialchars(mb_substr(strip_tags($post->post_content),0,100)).'... ...'?></p>
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