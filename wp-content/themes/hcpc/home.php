<?php get_header(); ?>
 	<?php
 		//默认首页自宣图片url
 		$indexUrl = get_bloginfo( 'template_url' )."/images/index_big.jpg";
 		$indexAtts = get_children( array('post_parent'=>1,'post_type=attachment','order'=> 'DESC', 'orderby' => 'post_date', 'numberposts'=>1));
 		if($indexAtts){
 			foreach ($indexAtts as $att){
 				if(wp_attachment_is_image($att->ID)){
 					$indexUrl = wp_get_attachment_url($att->ID);
 					break;
 				}
 			}
 		}
 	?>
	<section id="index-main" style="background:url(<?php echo $indexUrl?>) no-repeat;">
		<!-- 数字滚动 -->
		<?php 
			$content5 = get_post($dummy_id=5)->post_content;
			echo preg_replace_callback('/((\${work_count})(\+(\d)*)?)/', "getTotalWorkCount", $content5);
			function getTotalWorkCount($matcher){
				$hasShow = $matcher[1];
				global $wpdb;
				$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM work_reg_apply WHERE status!=%d", '-100'));
				eval("\$totalCount = $count$matcher[3];");
				return $totalCount;
			}
		?>
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
				<p class="sort-ft">
					<!--[if IE 6]>
					<embed src="<?php bloginfo( 'template_url' ); ?>/images/sort_cover.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="100" height="220"></embed>
					<![endif]-->
				</p>
			</div>			
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