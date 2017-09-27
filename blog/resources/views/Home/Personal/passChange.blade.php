@extends('Layout/personBase')

@section('title', '密码修改')

@section('css')

	<link href="{{asset('Home/css/stepstyle.css')}}" rel="stylesheet" type="text/css">

@endsection


@section('right')

	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
	</div>
	<hr/>
	<!--进度条-->
	
	<form class="am-form am-form-horizontal">
		<div class="am-form-group">
			<label for="user-old-password" class="am-form-label">原密码</label>
			<div class="am-form-content">
				<input type="password" id="user-old-password" placeholder="请输入原登录密码">
			</div>
		</div>
		<div class="am-form-group">
			<label for="user-new-password" class="am-form-label">新密码</label>
			<div class="am-form-content">
				<input type="password" id="user-new-password" placeholder="由数字、字母组合">
			</div>
		</div>
		<div class="am-form-group">
			<label for="user-confirm-password" class="am-form-label">确认密码</label>
			<div class="am-form-content">
				<input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码">
			</div>
		</div>
		<div class="info-btn">
			<div class="am-btn am-btn-danger">保存修改</div>
		</div>

	</form>
			
@endsection
				