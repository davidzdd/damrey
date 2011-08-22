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

		<!-- 宣传语 -->
		<div id="publicity">通过我们专业、权威、高效的服务，让您和您的企业</div>

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

		<!-- qq -->
		<div id="qq">
			<iframe scrolling="no" frameborder="0" width="102" height="24" allowtransparency="true" src="https://id.b.qq.com/static/account/bizqq/wpa/wpa_a02.html?type=2&kfuin=800057123&ws=http%3A%2F%2F&btn1=%E4%BC%81%E4%B8%9AQQ%E4%BA%A4%E8%B0%88"></iframe>
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=100165105&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:100145105:47" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
		</div>

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