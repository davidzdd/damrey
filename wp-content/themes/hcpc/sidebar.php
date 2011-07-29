<aside id="submain">
	<?php 
		//【当前分类】
		$curQueryObj = get_queried_object();
		if(is_category()){
			$catName = $curQueryObj->name;
		}else{
			$curPost = $curQueryObj;
			$curCatArr = get_the_category();
			//【当前分类】访问第三级页面时，$curQueryObj需要重新设置
	    	$curQueryObj = $curCatArr[0];
	    	$catName = $curQueryObj->name;
		}
		$childCatArr = get_terms('category',"child_of={$curQueryObj->term_id}&hierarchical=0&hide_empty=0&orderby=slug&order=ASC");
	?>
	<div class="subitem sub-nav">
		<h2 class="sub-hd"><?php echo $catName?></h2>
		<ul class="sub-bd">
		<?php if(is_category() && !is_wp_error($childCatArr) && count($childCatArr)>0){?>
			<?php foreach($childCatArr as $childCat){
					if($childCat->term_id == 38){
						$url = "http://www.bqba.com.cn/hcpc/hcpc/index.php?r=work/register";
					}else{
						$url = get_category_link($childCat);
					} 
				?>
				<li <?php if($curQueryObj->term_id == $childCat->term_id){?>class="cur"<?php }?>><a href="<?php echo $url;?>"><?php echo $childCat->name?></a></li>
			<?php }?>
		<?php }else{?>
			<?php $postAll = get_posts( array( 'category' => $curQueryObj->term_id, 'orderby'=>'ID', 'order'=>'ASC'))?>
			<?php foreach($postAll as $post){?>
				<li <?php if($curPost->ID == $post->ID){?>class="cur"<?php }?>><a href="<?php echo get_permalink($post);?>"><?php echo $post->post_title?></a></li>
			<?php }?>
		<?php }?>
		</ul>
		<p class="sub-ft"></p>
	</div>
	<!-- 左侧导航位：电话和QQ -->
	<div class="subitem phone">
		<h2 class="sub-hd">服务电话</h2>
		<div class="sub-bd">
			<dl>
				<dt>客服</dt>
				<dd>
					<p>0571-87889048</p>
					<p>0571-88074868</p>
				</dd>
			</dl>
			<dl>
				<dt>客服</dt>
				<dd>
					<p>0571-87889048</p>
					<p>0571-88074868</p>
				</dd>
			</dl>
		</div>
		<p class="sub-ft">&nbsp;</p>
	</div>

	<div class="subitem qq">
		<h2 class="sub-hd">QQ登记</h2>
		<div class="sub-bd">
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=7154929&amp;site=qq&amp;menu=yes"><img border="0" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:7154929:50" title="点击这里给我发消息"></a>
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=7154929&amp;site=qq&amp;menu=yes"><img border="0" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:7154929:50" title="点击这里给我发消息"></a>
		</div>
		<p class="sub-ft">&nbsp;</p>

	</div>

	<!--
	<?php 
		$posts = get_posts( array( 'category' => 11, 'order' => 'ASC'));
		foreach ($posts as $post) {
			echo $post->post_content;
		}
	?>
	-->
</aside>