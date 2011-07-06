<?php get_header(); ?>

	<section id="wrap">
		<aside id="submain">
			<?php get_sidebar("login"); ?>
		</aside>

		<div id="main">

			<div id="nav">
				
			</div>

			<div id="cont">
				<div class="cont-item">
					<h1 class="cont-hd">登录</h1>
					<div class="cont-bd">
						<table class="login-table">
							<tbody>
								<tr>
									<th>用户名：</th>
									<td><input id="name" name="name" type="text" class="txt" /></td>
								</tr>
								<tr>
									<th>密码：</th>
									<td><input id="pwd" name="pwd" type="password" class="txt" /></td>
								</tr>
								<tr>
									<th></th>
									<td><label><input type="checkbox" id="remember" name="remember" value="" /> 下次自动登录</label></td>
								</tr>
								<tr class="btn">
									<th></th>
									<td>
										<input id="loginButton"  name="loginButton" type="button" class="submit" value="登陆"/>
										<span class="l2">还没有帐号，<a href="<?php echo site_url("register.php")?>">立即注册</a></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
						
				</div>

			</div>
		</div>

	</section>

</div>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/site.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/ed.js"></script>
<script type="text/javascript">
<!--
$(function(){
	$("#loginButton").click(function(){
		var id = this.id;
		Act.login(id);
		return false;
	});
});

var Act = {
	loginSymbol:0,
	login:function(id){
		if(Act.validate()){
			var remember = 0;
			if($("#remember").attr("checked")==true){
				remember = 1;
			}	
			Act.loginSymbol=1;
			var data = 'name='+site.getValue("name")+"&pwd="+site.getValue("pwd")+"&remember="+remember;
			site.ajaxSubmit('<?php echo site_url('login.php');?>', data, function(res){
				Act.loginSymbol=0;
				if(res.symbol==true){
					window.location.href=res.returnUrl;
				}else{
					site.confirm("提示信息",'用户名或密码错误，请重试...');
				}
			});
		}
	},
	validate:function(){
		if(Act.loginSymbol==1){
			site.confirm("提示信息","正在提交数据，请稍后...");
			return false;
		}
		var name = site.getValue("name");
		var nameLength = name.length;	
		if(nameLength<=0){
			alert("请输入用户名");
			$("#name").focus();
			return false;
		}else if(nameLength>20 || nameLength<6){
			alert("用户名不正确");
			return false;
		}
		var pwd = site.getValue("pwd");
		var pwdLength=pwd.length;
		if(pwdLength<=0){
			alert("请输入密码");
			$("#pwd").focus();
			return false;
		}else if(pwdLength>16 || pwdLength<6){
			alert("密码不正确");
			return false;
		}
		return true;
	}
}
//-->
</script>
<?php get_footer(); ?>