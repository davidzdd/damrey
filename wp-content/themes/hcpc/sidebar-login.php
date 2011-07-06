<aside id="submain">
	<div class="subitem sub-nav">
		<h2 class="sub-hd"><?php global $pageSidebarName; echo $pageSidebarName?></h2>
	</div>
	<!-- 左侧导航位：电话和QQ -->
	<?php 
		$posts = get_posts( array( 'category' => 11, 'order' => 'ASC'));
		foreach ($posts as $post) {
			echo $post->post_content;
		}
	?>
</aside>