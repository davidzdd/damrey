<?php get_header(); ?>
 	<?php 
		$catArr = get_the_category();
		$curCat = $catArr[0];
		$childCatArr = get_terms('category',"child_of={$curCat->term_id}");
	?>
	 <section id="wrap">
		<?php get_sidebar(); ?>
		<div id="main">
			<div id="nav">
				<span>当前位置：</span><a href="#">首页</a> &gt; <a href="#">办事大厅</a> &gt;美术作品
			</div>
			<div id="cont">
			<?php if(is_category() && !is_wp_error($childCatArr) && count($childCatArr)>0){?>
				<div class="cont-item">
					<h1 class="cont-hd"><?php echo $childCat->name?></h1>
					<div class="cont-bd">
						<?php while ( have_posts() ) : the_post(); ?>
						<article class="article">
							<a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
								<h3><?php the_title()?><img src="http://t3.qpic.cn/mblogpic/fdec23190aee07bb3284/160" alt="<?php the_title()?>"/></h3>
							</a>
							<p><?php echo mb_substr(get_the_excerpt(),0,100).'... ...'?></p>
							<a href="<?php the_permalink()?>" class="view-all">查看详细</a>
						</article>
						<?php endwhile; ?>
					</div>
				</div>
			<?php }else{?>
				<div class="cont-item">
					<div class="cont-bd">
						<?php while ( have_posts() ) : the_post(); ?>
						<article class="article">
							<a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
								<h3><?php the_title()?><img src="http://t3.qpic.cn/mblogpic/fdec23190aee07bb3284/160" alt="<?php the_title()?>"/></h3>
							</a>
							<p><?php echo mb_substr(get_the_excerpt(),0,100).'... ...'?></p>
							<a href="<?php the_permalink()?>" class="view-all">查看详细</a>
						</article>
						<?php endwhile; ?>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>