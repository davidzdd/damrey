<aside id="submain">
	<div class="subitem sub-nav">
		<h2 class="sub-hd">个人中心</h2>
		<ul class="sub-bd">
			<li class="cur"><a href="#">备案记录</a></li>
<!--			<li><a href="#">资料修改</a></li>-->
<!--			<li><a href="#">修改密码</a></li>-->
		</ul>
		<p class="sub-ft"></p>
	</div>

	<!-- 左侧导航位：电话和QQ -->
	<?php 
		$posts = get_posts( array( 'category' => 11, 'order' => 'ASC'));
		foreach ($posts as $post) {
			echo $post->post_content;
		}
	?>
</aside>