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
					<h1 class="cont-hd">请填写以下信息注册</h1>
					<div class="cont-bd">
						<form method="post" name="form" action="#">
						<table class="l2 login-table reg-table ">
							<tbody>
								<tr>
									<th>用户名：</th>
									<td><input id="name" name="name" type="text" class="txt" /></td>
									<td class="reg-tip">可由6-20个字符组成（包括小写字母、数字、下划线、中文，一个汉字为两个字符），一旦注册成功用户名不能修改。</td>
								</tr>
								<tr>
									<th>密码：</th>
									<td><input id="pwd" name="pwd" type="password" class="txt" /></td>
									<td class="reg-tip">密码由6-16个字符组成，请使用英文字母、数字或符号的组合密码，尽量不要单独使用英文字母、数字或符号作为您的密码。</td>
								</tr>
								<tr>
									<th>再输入一次密码：</th>
									<td><input id="repwd" name="repwd" type="password" class="txt" /></td>
									<td class="reg-tip">请再输入一遍您上面输入的密码。</td>
								</tr>
<!--								<tr>-->
<!--									<th>验证码：</th>-->
<!--									<td><input id="captcha" name="captcha" type="text" class="txt" /></td>-->
<!--									<td class="reg-tip"><a href="javascript:;"><img src="http://www.19go.com/util/capture?1291872334873" alt="#"/></a> <a href="javascript:;">看不清楚，点击换一张 </a></td>-->
<!--								</tr>-->
								<tr class="btn">
									<th></th>
									<td colspan="2">
										<input id="regButton" name="regButton" type="button" class="submit reg-btn" value="同意以下注册条款并提交"/>
									</td>
								</tr>
								<tr class="noborder">
									<td colspan="3">
										<div class="reg-rules">
											1．本网站管理提供的服务将完全按其发布的会员服务内容以及双方所签署协议的约定，服务条款和操作规则严格执行。用户必须完全同意所有服务条款并完成注册程序，才能成为本网站管理的正式用户。<br />2．服务简介本网站管理运用自己的操作系统通过国际互联网提供网络服务。同时，用户必须：<br />（1）自行配备上网的所需设备，包括个人电脑、调制解调器或其他上网装置。<br />（2）自行负担上网所支付的与此服务有关的电话费用，网络费用等。<br />3．基于本网站管理所提供的网络服务的重要性，用户应同意：<br />（1）对注册过程中的各项问题，提供真实、准确的回答；<br />（2）不断更新资料，符合及时、详尽、准确的要求。本网站管理不公开用户的姓名、地址、电子邮件箱和笔名，除以下情况外
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>
						
				</div>

			</div>
		</div>

	</section>

</div>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/validate.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/site.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/ed.js"></script>
<script type="text/javascript">
<!--
$(function(){
	$("#regButton").click(function(){
		var id = this.id;
		Act.register(id);
		return false;
	});
});

var Act = {
	registerSymbol:0,
	register:function(id){
		if(Act.validate()){
			Act.registerSymbol=1;
			var data = 'name='+site.getEncodeValue("name")+"&pwd="+site.getEncodeValue("pwd")+"&repwd="+site.getEncodeValue("repwd");
			site.ajaxSubmit('<?php echo site_url("/register.php")?>', data, function(res){
				Act.registerSymbol=0;
				if(res.code==100){
					window.location.href=res.returnUrl;
				}else if(res.code==101){
					site.confirm('提示',"验证码错误，请重新输入!");
				}else if(res.code==102){
					site.confirm('提示',"该用户名已经被注册，请重新输入注册名");
					$("#name").focus();
				}else if(res.code==103){
					site.confirm('提示',"该email已经被注册，请重新输入email");
					$("#email").focus();
				}else if(res.code==199){
					site.confirm('提示',"注册失败，请重试...");
				}
			});
		}
	},
	validate:function(){
		if(Act.registerSymbol==1){
			site.confirm("提示信息","正在提交数据，请稍后...");
			return false;
		}
		var name = site.getValue("name");
		var nameLength = name.length;	
		if(nameLength<=0){
			alert("请输入注册用户名");
			$("#name").focus();
			return false;
		}else if(nameLength<6){
			alert("注册用户名不能少于6个字符");
			$("#name").focus();
			return false;
		}else if(nameLength>20){
			alert("注册用户名不能超过20个字符");
			return false;
		}else if(!validate.isUserName(name)){
			alert("注册用户名只能是数字,字母,中文");
			return false;
		}
		var pwd = site.getValue("pwd");
		pwdLength=pwd.length;
		if(pwdLength<=0){
			alert("请设置密码");
			$("#pwd").focus();
			return false;
		}else if(pwdLength<6){
			alert("密码不能少于6位");
			return false;
		}else if(pwdLength>16){
			alert("密码不能超过16位");
			return false;
		}
		var rePwd = site.getValue("repwd");
		if(rePwd != pwd){
			alert("两次密码输入不相同");
			$("#repwd").focus();
			return false;
		}
//		var captcha = site.getValue("captcha");
//		var captchaLength = captcha.length;
//		if(captchaLength<=0){
//			alert("请输入验证码");
//			$("#captcha").focus();
//			return false;
//		}else if(captchaLength!=6){
//			alert("验证码不正确，请重新输入");
//			$("#captcha").focus();
//			return false;
//		}
		return true;
	}
}
//-->
</script>
<?php get_footer(); ?>