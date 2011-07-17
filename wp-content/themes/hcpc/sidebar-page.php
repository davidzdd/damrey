<aside id="submain">
	<?php 
	 	$page = get_page( $page_id );
	?>
	<div class="subitem sub-nav">
		<h2 class="sub-hd"><?php echo $page->post_title?></h2>
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