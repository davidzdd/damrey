<?php get_header(); ?>
 
	<section id="wrap">
		<aside id="submain">
			<?php get_sidebar("user")?>
		</aside>

		<div id="main">

			<div id="nav">
				<span>当前位置：</span><a href="#">首页</a>&nbsp;>&nbsp;个人中心&nbsp;>&nbsp;<?php echo $position?>
			</div>

			<div id="cont">
				<div class="cont-item">
					<h1 class="cont-hd">登陆</h1>
					<div class="cont-bd">
						<table class="l2 data-table">
							<thead>
								<tr>
									<th width="10%">流水号</th>
									<th width="25%">作品名称</th>
									<th width="15%">填报日期</th>
									<th width="25%">附件</th>
									<th width="10%">
										<dl class="select audit">
											<dt>状态</dt>
											<dd>
												<a href="javascript:;">未审</a>
												<a href="javascript:;">初审</a>
												<a href="javascript:;">已完成</a>
											</dd>
										</dl>
									</th>
									<th width="15%">操作</th>
							</thead>
							<tbody>
							<?php if($workApplyArrDB){?>
								<?php foreach ($workApplyArrDB as $workApply){?>
									<tr>
										<td><?php echo $workApply->id?></td>                                                                            
										<!--<td><?php echo $workApply->applyer_name?></td>-->
										<td><?php echo $workApply->name?></td>
										<!--<td><?php echo $workApply->cert_id?></td>-->
										<td><?php echo date('Y-m-d H:i:s', $workApply->created_at)?></td>
										<td class="view-pic"><a href="<?php echo $workApply->attachment?>" target="_blank"><span><img src="<?php echo $workApply->attachment?>" height="250" /></span><?php echo $workApply->attachment_orig_name?></a></td>
										<td class="<?php echo $statusArr[$workApply->status]['class']?>"><?php echo $statusArr[$workApply->status]['name']?></td>
										
										<td>
										<a href="<?php echo $workApply->id?>" target="_blank">查看</a></td>
									</tr>
								<?php }?>
								<?php }else{?>
									<tr><td>暂无符合条件的结果</td></tr>
								<?php }?>
							</tbody>
						</table>
						<?php echo $pageHtml?>
					</div>
						
				</div>

			</div>
		</div>

	</section>
	
</div>
<?php get_footer(); ?>