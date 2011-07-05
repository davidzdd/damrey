<aside id="submain">
	<?php 
	    $curQueryObj = get_queried_object();
	    if(!isset($curCat)){
			$catArr = get_the_category();
			$curCat = $catArr[0];
	    }
	    if(!isset($childCatArr)){
	    	$childCatArr = get_terms('category',array("child_of"=>$curCat->term_id));
	    	var_dump($curCat->term_id);
	    }
	?>
	<div class="subitem sub-nav">
		<h2 class="sub-hd"><?php echo $curCat->name?></h2>
		<ul class="sub-bd">
		<?php if(is_category() && !is_wp_error($childCatArr) && count($childCatArr)>0){?>
			<?php foreach($childCatArr as $childCat){?>
				<li <?php if($curQueryObj->term_id == $curCat->term_id){?>class="cur"<?php }?>><a href="<?php echo get_category_link($childCat);?>"><?php echo $childCat->name?></a></li>
			<?php }?>
		<?php }else{?>
			<?php $postAll = get_posts( array( 'category' => $curCat->term_id ))?>
			<?php foreach($postAll as $post){?>
				<li <?php if($curQueryObj->ID == $post->ID){?>class="cur"<?php }?>><a href="<?php echo get_permalink($post);?>"><?php echo $post->post_title?></a></li>
			<?php }?>
		<?php }?>
		</ul>
		<p class="sub-ft"></p>
	</div>

	<div class="subitem phone">
		<h2 class="sub-hd">服务电话</h2>
		<div class="sub-bd">
			0571-87889048<br />0571-88074868 
		</div>
		<p class="sub-ft"></p>
	</div>

	<div class="subitem qq">
		<h2 class="sub-hd">QQ登记</h2>
		<div class="sub-bd">
			<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=7154929&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:7154929:50" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>

			<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=7154929&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:7154929:50" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>
		</div>
		<p class="sub-ft"></p>
	</div>
</aside>