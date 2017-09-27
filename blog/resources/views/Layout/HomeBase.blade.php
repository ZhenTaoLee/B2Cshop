<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>


	<link href="{{asset('Home/css/amazeui.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('Home/css/admin.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('Home/css/demo.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('Home/css/personal.css')}}" rel="stylesheet" type="text/css">

	<script src="{{asset('Home/js/jquery.min.js')}}"></script>
	<script src="{{asset('Home/js/jquery-1.7.min.js')}}"></script>
	<script src="{{asset('Home/js/amazeui.min.js')}}"></script>
	<style type="text/css">
		#zuzhang{
			width: 50px;
			position: fixed;
			right: 0px;
			bottom: 50px;
			z-index: 100;
		}
	</style>
	@section('css')
   	   {{-- 子模板css --}}
		

   	@show
</head>
<body>
	
	<nav>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="/login" target="_top" class="h">亲，请登录</a>
							<a href="/register" target="_top">免费注册</a>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd">
							<a href="/" target="_top" class="h">商城首页</a>
						</div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng">
							<a href="{{url('/Home/personal')}}" target="_top">
								<i class="am-icon-user am-icon-fw"></i>个人中心
							</a>
						</div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd">
							<a id="mc-menu-hd" href="javascript:;" target="_top">
								<i class="am-icon-shopping-cart  am-icon-fw"></i>
								<span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong>
							</a>
						</div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd">
							<a href="javascript:;" target="_top">
								<i class="am-icon-heart am-icon-fw"></i>
								<span>收藏夹</span>
							</a>
						</div>
					</div>
				</ul>
			</div>
					
			<!--悬浮搜索框-->
			<div class="nav white">
				<div class="logo"><img src="{{asset('Home/images/logo.png')}}" /></div>
				<div class="logoBig">
					<li><img src="{{asset('Home/images/logobig.png')}}" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="javascript:;"></a>
					<form action="javascript:;" method="get">
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
	</nav>


	<main>
		@section('main')
		    {{-- 网页主体 --}}
		
		@show
	
	</main>

	<div class="clear"></div>
		<!-- 底部 -->
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
					<em>© 2015-2025 elgots@163.com 版权所有</em>
				</p>
			</div>
		</div>
		

	

	@section('bottom-js')
			{{-- 页脚js代码 --}}
	@show
	<a href="javascript:scrollTo(0,0);"><img src="{{asset('Home/images')}}/timg.jpg" alt="" id="top" style="width:50px;position: fixed;bottom: 100px;right: 0px;"></a>
	
	<img src="{{asset('Home\images/shabi.png')}}" title="点击可缩放!" alt="点击可放大!" id="zuzhang">
	<script>
		$('#zuzhang') .on( 'click' , function () {
			var that = $(this);
			if (that.css('width') == '50px') {
				that.css('width','200px');
				$('#top').css('bottom', '250px');
			} else {
				that.css('width','50px');
				$('#top').css('bottom', '100px');				
			}
		})
	</script>
</body>
</html>