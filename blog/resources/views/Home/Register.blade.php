<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link href="{{asset('Home/css')}}/dlstyle.css" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="{{asset('Home/css')}}/amazeui.min.css" />
		<script src="{{asset('Home/js')}}/jquery.min.js"></script>
		<script src="{{asset('Home/js')}}/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="/"><img alt="" src="{{asset('Home/images')}}/logobig.png" /></a>
			<!-- <div class="reglogo-title">欢迎注册</div> -->
			<div class="have-account">
				已有账号？
				<a href="/login" style="font-size:20px">请登录</a>
			</div>
		</div>

		<div class="res-banner">
			<!-- 右侧图片 -->
			<div class="res-main">
				<div class="login-banner-bg"><span></span></div>
				<!-- 左侧图片 -->
				<div class="login-box">
					<div class="am-tab-panel">
						<form method="post" action="javascript:;">
							<div class="user-name">
								<label for="username"><i class="am-icon-user"></i></label>
								<input type="text" name="uname" id="username" placeholder="输入用户名">
							</div>
							<div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" name="upass" id="password" placeholder="设置密码">
							</div>
							<div class="user-pass">
								<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								<input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
							</div>
							<div class="user-email">
								<label for="email"><i class="am-icon-envelope"></i></label>
								<input type="text" name="email" id="email" placeholder="输入邮箱">
							</div>

							<div class="user-phone">
								<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								<input type="tel" name="phone" id="phone" placeholder="请输入手机号">
							</div>
							<div class="verification">
								<label for="code"><i class="am-icon-code-fork"></i></label>
								<input type="tel" name="code" id="code" placeholder="请输入验证码">
								<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
									<span id="dyMobileButton">获取验证码</span></a>
							</div>
						</form>
						<!-- <div class="login-links">
									<label for="reader-me">
											<input id="reader-me" type="checkbox" onclick="disa()" checked="checked"> 点击表示您同意商城《服务协议》
										</label>
								</div> -->
						<div class="am-cf">
							<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
						</div>

					</div>

					<script>
						//$(function() {
						//	$('#doc-my-tabs').tabs();
						//})
						function disa() {
							var check = $("input[type='submit']");
							console.log(check.attr('value'));
						}
					</script>

				</div>
			</div>

		</div>
		</div>

		<div class="footer ">
			<div class="footer-hd ">
				<p>
					<a href="javascript:; ">恒望科技</a>
					<b>|</b>
					<a href="javascript:; ">商城首页</a>
					<b>|</b>
					<a href="javascript:; ">支付宝</a>
					<b>|</b>
					<a href="javascript:; ">物流</a>
				</p>
			</div>
			<div class="footer-bd ">
				<p>
					<a href="javascript:; ">关于恒望</a>
					<a href="javascript:; ">合作伙伴</a>
					<a href="javascript:; ">联系我们</a>
					<a href="javascript:; ">网站地图</a>
					<em>© 2015-2025 Hengwang.com 版权所有. elgots@163.com</em>
				</p>
			</div>
		</div>
	</body>

</html>