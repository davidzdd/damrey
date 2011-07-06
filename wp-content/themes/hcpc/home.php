<?php get_header(); ?>
 
	<section id="index-main" style="background:url(<?php bloginfo( 'template_url' ); ?>/images/index_big.jpg) no-repeat;">
		<!-- 数字滚动 -->
		<?php echo get_post($dummy_id=5)->post_content;?>
		<!-- 指示牌 -->
		<?php echo get_post($dummy_id=6)->post_content;?>
		<!-- 首页轮播 -->
		<div id="sort">
			<div id="scroll">
				<ul class="sort-bd">
					<?php echo get_post($dummy_id=2)->post_content;?>
				</ul>
				<p id="scroll-btn">
					<a href="javascript:;" id="scroll-prev">上一个</a>
					<a href="javascript:;" id="scroll-next">下一个</a>
				</p>
			</div>
			<p class="sort-ft"></p>
		</div>

		<div id="intro">
			<!-- 中心简介 -->
			<div class="intro-mod">
				<?php $post_3 = get_post($dummy_id=3);?>
				<div class="intro-hd"><h2><em><?php echo $post_3->post_title?></em></h2></div>
				<p class="intro-bd l2">
					<?php echo $post_3->post_content?>
				</p>
			</div>
			<!-- 中心动态 -->
			<div class="intro-mod news">
				<?php $post_4 = get_post($dummy_id=4);?>
				<div class="intro-hd">
					<h2><em><?php echo $post_4->post_title?></em></h2>
				</div>
				<ul class="intro-bd">
					<?php echo $post_4->post_content?>
				</ul>
			</div>
		</div>

	</section>

</div>

<?php get_footer(); ?>