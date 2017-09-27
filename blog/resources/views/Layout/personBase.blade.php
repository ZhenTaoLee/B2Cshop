@extends('Layout/HomeBase')

@section('main')
	<div class="nav-table">
		<div class="long-title"><span class="all-goods">全部分类</span></div>
		<div class="nav-cont">
			<ul>
				<li class="index"><a href="#">首页</a></li>
				<li class="qc"><a href="#">闪购</a></li>
				<li class="qc"><a href="#">限时抢</a></li>
				<li class="qc"><a href="#">团购</a></li>
				<li class="qc last"><a href="#">大包装</a></li>
			</ul>
			<div class="nav-extra">
				<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
				<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
			</div>
		</div>
	</div>
	<b class="line"></b>

	<div class="center">
		<div class="col-main">
			<div class="main-wrap">
				<div class="wrap-left">
				@section('right')

					{{-- 主体详情 --}}

				@show
				</div>
			</div>
		</div>			
		<aside class="menu">
			<ul>
				<li class="person active">
					<a href="{{url('/Home/personal')}}"><i class="am-icon-user"></i>个人中心</a>
				</li>
				<li class="person">
					<p><i class="am-icon-newspaper-o"></i>个人资料</p>
					<ul>
						<li> <a href="{{url('/Home/information')}}">个人信息</a></li>
						<li> <a href="{{url('/Home/address')}}">地址管理</a></li>
						<li> <a href="{{url('/Home/passChange')}}">密码修改</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-balance-scale"></i>我的交易</p>
					<ul>
						<li><a href="{{url('/Home/order')}}">订单管理</a></li>
						<li><a href="{{url('/Home/refund')}}">退款售后</a></li>
						<li><a href="{{url('/Home/evaluate')}}">评价商品</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-dollar"></i>我的资产</p>
					<ul>
						<li> <a href="{{url('/Home/intergral')}}">我的积分</a></li>
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-tags"></i>我的收藏</p>
					<ul>
						<li> <a href="{{url('/Home/collection')}}">收藏</a></li>
						<li> <a href="{{url('/Home/footprint')}}">足迹</a></li>					
					</ul>
				</li>
			</ul>
		</aside>

	</div>

@endsection