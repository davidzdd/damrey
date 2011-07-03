<?php get_header(); ?>
 
	 <section id="wrap">

		<?php get_sidebar(); ?>

		<div id="main">

			<div id="nav">
				<span>当前位置：</span><a href="#">首页</a> &gt; <a href="#">办事大厅</a> &gt; <a href="#">普通作品登记</a> &gt; <a href="#">美术作品</a>
			</div>

			<div id="cont">

				<?php while ( have_posts() ) : the_post(); ?>
				<article class="cont-item" id="article">
					<div class="cont-hd">
						<h1><?php the_title(); ?></h1>
						<span><?php the_time() ?></span>
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