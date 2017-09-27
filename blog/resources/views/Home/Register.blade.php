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
								<span id="name0" style="display:none;color:red;font-size:13px">用户名已存在</span>
								<span id="name1" style="display:none;color:#05F22E;font-size:14px">用户名格式正确</span>
								<span id="name2" style="display:none;color:red;font-size:13px">用户名不能为空，且格式必须由6-16位数字,字母组成</span>
							</div>
							<div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" name="upass" id="password" placeholder="设置密码">
								<span id="pass1" style="display:none;color:red;font-size:14px">密码不能为空,且格式必须包含数字,字母和特殊符号</span>
								<span id="pass2" style="display:none;color:#05F22E;font-size:14px">密码可以使用</span>
							</div>
							<div class="user-pass">
								<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								<input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
							</div>
							<div class="user-email">
								<label for="email"><i class="am-icon-envelope"></i></label>
								<input type="text" name="email" id="email" placeholder="输入邮箱">
								<span id="email0" style="display:none;color:red;font-size:14px">邮箱已被注册</span>
								<span id="email1" style="display:none;color:#05F22E;font-size:14px">邮箱格式正确</span>
								<span id="email2" style="display:none;color:red;font-size:14px">邮箱不能为空，且格式有误</span>
							</div>

							<div class="user-phone">
								<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								<input type="tel" name="uphone" id="phone" placeholder="请输入手机号">
								<span id="phone0" style="display:none;color:red;font-size:14px">该手机号已被注册</span>
								<span id="phone1" style="display:none;color:#05F22E;font-size:14px">手机格式正确</span>
								<span id="phone2" style="display:none;color:red;font-size:14px">手机不能为空，且必须由11位数字组成</span>
							</div>
							<div class="verification">
								<label for="code"><i class="am-icon-code-fork"></i></label>
								<input type="tel" name="code" id="code" placeholder="请输入验证码">
								<input type="button" id="dyMobileButton" value="获取验证码" onclick="sendemail()" /> 
								<span id="code0" style="display:none;color:red;font-size:14px">验证码为空</span>
								<span id="code1" style="display:none;color:#05F22E;font-size:14px">验证码正确</span>
								<span id="code2" style="display:none;color:red;font-size:14px">验证码错误</span>
									
							</div>
						</form>
								
						<div class="am-cf">
							<!-- <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"> -->
							<a href="javascript:;" class="am-btn am-btn-primary am-btn-sm am-fl am-register">注册</a>
						</div>

					</div>

					<script>
						// 判断用户名格式
						$('input[name="uname"]').blur(function () {
							
       					$.post(
       						'/user/name',
       						{'_token':'{{csrf_token()}}','name':$("#username").val()},
       						function(data)
								{
									if (data == 2)
									{

										$("#name2").css("display","block");
										$("input[name='uname']").on('focus',function() {
											$("#name1").css("display","none");
											

										});
									}else if(data == 1){
										$("#name2").css("display","none");
										$("#name1").css("display","block");
										$("input[name='uname']").on('focus',function() {
											$("#name2").css("display","none");

										});
									}
									

								});

						});

						// 判断手机格式
						$('input[name="uphone"]').blur(function () {
							
       					$.post(
       						'/user/phone',
       						{'_token':'{{csrf_token()}}','phone':$("#phone").val()},
       						function(phonedata)
								{
									if (phonedata == 2)
									{	
										$("#phone1").css("display","none");
										$("#phone2").css("display","block");
										$("input[name='uphone']").on('focus',function() {
											$("#phone1").css("display","none");
											

										});
									}else if(phonedata == 1){
										$("#phone2").css("display","none");
										$("#phone1").css("display","block");
										$("input[name='uphone']").on('focus',function() {
											$("#phone2").css("display","none");

										});
									}

								});

						});
						// 按钮接收验证码
						var countdown=60; 
						// var codes = Math.floor(Math.random()*8999+1000);
						function sendemail(){
						    var obj = $("#dyMobileButton");
						    var userPhone = $('input[name="uphone"]').val().trim();
						    var phoneLen = userPhone.length;
							  	if (phoneLen > 10) {

							  		 settime(obj);
							  	}
						   
						    
						    }
						function settime(obj) { //发送验证码倒计时
						    if (countdown == 0) { 
						        obj.attr('disabled',false); 
						        //obj.removeattr("disabled"); 
						        obj.val("获取验证码");
						        countdown = 60; 
						        return;
						    } else { 
						        obj.attr('disabled',true);
						        obj.val("重新发送(" + countdown + ")");
						        countdown--; 
						    } 
						setTimeout(function() { 
						    settime(obj) }
						    ,1000) 
						}

						// 提交手机以获取验证码
						 $('#dyMobileButton').click(function(){
						      var phone = $.trim($('#phone').val());
						      $.post('/user/code', 
						      	{'_token':'{{csrf_token()}}',
						      	'phone':phone},
						      	function(res){
						        if (res) {
						          	alert('验证码发送失败');
						        } else {
						        	alert('验证码发送成功');
						        }
						      });
						    });
						// 判断邮箱格式
						$('input[name="email"]').blur(function () {

							$.post(
								'/user/email',
								{'_token':'{{csrf_token()}}','email':$("#email").val()},
								function (emaildata)
								{
									if ( emaildata == 2 ) {
										$('#email1').css("display","none");
										$('#email2').css("display","block");
										$("input[name='email']").on('focus',function() {
											$('#email1').css("display","none");
										});
									}else if( emaildata == 1 ) {
										$('#email2').css("display","none");
										$('#email1').css("display","block");
										$("input[name='email']").on('focus',function() {
											$('#email2').css("display","none");
										});
									}

								});
						});
						// 判断密码格式
						$('input[name="upass"]').blur(function () {

							$.post(
								'/user/pass',
								{'_token':'{{csrf_token()}}','pass':$("#password").val()},
								function (passdata)
								{
									if ( passdata == 2 ) {

										$('#pass2').css("display","none");
										$('#pass1').css("display","block");
										$("input[name='pass']").on('focus',function() {
											$('#pass2').css("display","none");
										});
									}else if( passdata == 1 ) {
										$('#pass1').css("display","none");
										$('#pass2').css("display","block");
										$('input[name="upass"]').on('focus',function() {
											$('#pass1').css("display","none");
										});
									}

								});
						});
						
							
					//处理注册提交
					$('a.am-register').on( 'click',function () {

					 var uname = $('input[name="uname"]').val();
			     	 var upass = $('input[name="upass"]').val();
			     	 var email = $('input[name="email"]').val();
			     	 var uphone = $('input[name="uphone"]').val();
			     	 var code = $('input[name="code"]').val();
			     	 $.ajax({
						type: 'post',
						url: '{{url("/doregister")}}',
						data: 'name='+uname+'&pass='+upass+'&email='+email+'&phone='+uphone+'&code='+code+'&_token={{csrf_token()}}',
						success: function (data) {
					
						//用户存在时在这边
							if (data.status==1404) {

									$("#name0").css("display","block");
									$("input[name='uname']").on('focus',function() {
											$("#name1").css("display","none");
											$("#name2").css("display","none");
										});
								} else if (data.status==1405) {

									// $('#email1').css("display","none");
									$('#email0').css("display","block");
									$("input[name='email']").on('focus',function() {
										$('#email1').css("display","none");
										$('#email2').css("display","none");
									});
									// location.href = '{{url("/")}}';
								} else if (data.status==1406) {
											$("#phone2").css("display","none");
											$("#phone1").css("display","none");
										$("#phone0").css("display","block");
										$("input[name='uphone']").on('focus',function() {
											$("#phone2").css("display","none");
											$("#phone1").css("display","none");

										});

								}else if (data.status==1407){
									$("#code2").css("display","none");
									$("#code0").css("display","none");
									$("#code1").css("display","block");
									$("input[name='code']").on('focus',function() {
											$("#code2").css("display","none");
											$("#code0").css("display","none");
										});

								}else if (data.status==1408) {
									$("#code1").css("display","none");
									$("#code0").css("display","none");
									$("#code2").css("display","block");
									$("input[name='code']").on('focus',function() {
											$("#code1").css("display","none");
											$("#code0").css("display","none");
										});

								} else if(data.status == 1200){

										alert('注册成功');

										location.href = '{{url("/login")}}';
								}else if(data.status == 1500){

										alert('注册失败');

										location.href = '{{url("/register")}}';
								}
								
							
							},
							dataType:'json'
						});
			     	 });
					

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