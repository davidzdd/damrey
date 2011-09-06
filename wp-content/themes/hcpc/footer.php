<footer id="footer" class='clearall  <?php if ( is_home() ) : ?>index-footer<?php endif; ?>' >
	<div class="footer-cont">
		<!-- 站点页尾 -->
		<div id="copyright">
			<?php echo apply_filters('the_content', get_post($dummy_id=8)->post_content)?>
		</div>

		<dl id="friends" class="select">
			<dt>友情链接</dt>
			<dd>
				<?php foreach(get_bookmarks(array("category" => 5)) as $linkObj){?>
					<a href="<?php echo $linkObj->link_url?>" target="_blank"><?php echo $linkObj->link_name?></a>
				<?php }?>
			</dd>
		</dl>
	</div>
</footer>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script.js"></script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fac15e0060891fde163b9d44e5a144b09' type='text/javascript'%3E%3C/script%3E"));
</script>
</body> 
</html>