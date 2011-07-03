<?php get_header(); ?>
 
	 <section id="wrap">

		<?php get_sidebar(); ?>

		<div id="main">

			<div id="nav">
				<span>当前位置：</span><a href="#">首页</a> &gt; <a href="#">办事大厅</a> &gt;美术作品
			</div>

			<div id="cont">

				<div class="cont-item">
					<h1 class="cont-hd">普通作品登记</h1>
					<div class="cont-bd">

						<?php while ( have_posts() ) : the_post(); ?>
						<article class="article">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<h3><?php the_title(); ?><img src="http://t3.qpic.cn/mblogpic/fdec23190aee07bb3284/160" alt="动漫作品"/></h3>
							</a>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="view-all">查看详细</a>
						</article>
						<?php endwhile; ?>

					</div>
				</div>

			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>