<?php get_header(); ?>
 	 <?php 
 	 	$curPost = get_queried_object();
 	 	$curCatArr = get_the_category();
		//【当前分类】访问第三级页面时，$curQueryObj需要重新设置
	    $curCat = $curCatArr[0];
	    $linkSeparator = '&nbsp;>&nbsp;';
 	 	$urlPath = get_category_parents($curCat->term_id , true, $linkSeparator, false);
		$urlPath = substr($urlPath, 0, strripos($urlPath, $linkSeparator));
 	 ?>
	 <section id="wrap" class="wrap-article">

		<?php get_sidebar(); ?>

		<div id="main">

			<div id="nav">
				<span>当前位置：</span><a href="<?php echo home_url()?>">首页</a>&nbsp;>&nbsp;<?php echo $urlPath?>&nbsp;>&nbsp;<?php echo $curPost->post_title?>
			</div>

			<div id="cont">

				<article class="cont-item" id="article">
					<div class="cont-hd">
						<h1><?php echo $curPost->post_title ?></h1>
						<span><?php get_the_time('Y-m-d g:i', $curPost) ?></span>
					</div>
					
					<div class="cont-bd article">
						<!-- 文章内容 -->
						<?php echo str_replace(']]>', ']]&gt;', apply_filters('the_content', $curPost->post_content)); ?>
						
						<?php $attachments = get_children( array('post_parent'=>$curPost->ID,'post_type=attachment','order'=> 'ASC', 'orderby' => 'post_date'))?>
						<?php if($attachments){?>
							<!-- 附件内容 -->
							<table class="atc-table">
								<tbody>
									<tr>
										<th>材料下载</th>
									</tr>
									<?php $i=1;foreach ($attachments as $att){?>
										<tr>
											<td><a id="attach_<?php echo $att->ID?>" href="#" target="_blank" title="<?php echo $att->post_excerpt?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/attachment.gif" alt="<?php echo $att->post_excerpt?>" /><?php echo esc_html( basename( $att->guid ))?></a></td>
										</tr>
									<?php $i++;}?>
								</tbody>
						    </table>	
					    <?php }?>
					</div>	
						
				</article>

			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/site.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/ed.js"></script>
<script type="text/javascript">
<!--
$(function(){
	$("[id^=attach_]").click(function(){
		<?php $currentFrontUser = UserIdentity::getLogonUser()?>
		<?php if ( $currentFrontUser && $currentFrontUser->id>0) {?>
		var loged = true;
		<?php }else{?>
		var loged = false;
		<?php }?>
		if(!loged){
			site.confirm("提示信息",'登录后，方可进行附件下载！',function(){
				window.location.href='<?php echo home_url("/login.php")?>';
				return true;
			});
			return false;
		}
		window.location.href='<?php echo home_url("/download.php")?>?id='+this.id.split('_')[1];
		return false;
	});
})
//-->
</script>
<?php get_footer(); ?>