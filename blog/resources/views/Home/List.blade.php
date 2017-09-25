{{-- 模板名字 --}} 
@extends('Layout/HomeBase')


{{-- 页面名字 --}}
@section('title', '搜索页面') 



{{-- 加载css/js文件 --}} 
@section('css')
	<link href="{{asset('Home/css')}}/seastyle.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{asset('Home/js')}}/script.js"></script>
@endsection {{-- 网页主体 --}}





@section('main')
<b class="line"></b>
<div class="search">
	<div class="search-list">
		<div class="nav-table">
			<div class="long-title"><span class="all-goods">全部分类</span></div>
			<div class="nav-cont">
				<ul>
					<li class="index">
						<a href="/">首页</a>
					</li>
					<li class="qc">
						<a href="javascript:;">闪购</a>
					</li>
					<li class="qc">
						<a href="javascript:;">限时抢</a>
					</li>
					<li class="qc">
						<a href="javascript:;">团购</a>
					</li>
					<li class="qc last">
						<a href="javascript:;">大包装</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="am-g am-g-fixed">
	<div class="am-u-sm-12 am-u-md-12">
		<div class="theme-popover">
			<div class="searchAbout">
				<span class="font-pale">相关搜索：</span>
				<a title="坚果" href="javascript:;">坚果</a>
				<a title="瓜子" href="javascript:;">瓜子</a>
				<a title="鸡腿" href="javascript:;">豆干</a>
			</div>
			<ul class="select">
				<p class="title font-normal">
					<span class="fl">松子</span>
					<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
				</p>
				<div class="clear"></div>
				<li class="select-result">
					<dl>
						<dt>已选</dt>
						<dd class="select-no"></dd>
						<p class="eliminateCriteria">清除</p>
					</dl>
				</li>
				<div class="clear"></div>
				<li class="select-list">
					<dl id="select1">
						<dt class="am-badge am-round">品牌</dt>

						<div class="dd-conent">
							<dd class="select-all selected">
								<a href="javascript:;">全部</a>
							</dd>
							<dd>
								<a href="javascript:;">百草味</a>
							</dd>
							<dd>
								<a href="javascript:;">良品铺子</a>
							</dd>
							<dd>
								<a href="javascript:;">新农哥</a>
							</dd>
							<dd>
								<a href="javascript:;">楼兰蜜语</a>
							</dd>
							<dd>
								<a href="javascript:;">口水娃</a>
							</dd>
							<dd>
								<a href="javascript:;">考拉兄弟</a>
							</dd>
						</div>

					</dl>
				</li>
				<li class="select-list">
					<dl id="select2">
						<dt class="am-badge am-round">种类</dt>
						<div class="dd-conent">
							<dd class="select-all selected">
								<a href="javascript:;">全部</a>
							</dd>
							<dd>
								<a href="javascript:;">东北松子</a>
							</dd>
							<dd>
								<a href="javascript:;">巴西松子</a>
							</dd>
							<dd>
								<a href="javascript:;">夏威夷果</a>
							</dd>
							<dd>
								<a href="javascript:;">松子</a>
							</dd>
						</div>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select3">
						<dt class="am-badge am-round">选购热点</dt>
						<div class="dd-conent">
							<dd class="select-all selected">
								<a href="javascript:;">全部</a>
							</dd>
							<dd>
								<a href="javascript:;">手剥松子</a>
							</dd>
							<dd>
								<a href="javascript:;">薄壳松子</a>
							</dd>
							<dd>
								<a href="javascript:;">进口零食</a>
							</dd>
							<dd>
								<a href="javascript:;">有机零食</a>
							</dd>
						</div>
					</dl>
				</li>

			</ul>
			<div class="clear"></div>
		</div>
		<div class="search-content">
			<div class="sort">
				<li class="first">
					<a title="综合">综合排序</a>
				</li>
				<li>
					<a title="销量">销量排序</a>
				</li>
				<li>
					<a title="价格">价格优先</a>
				</li>
				<li class="big">
					<a title="评价" href="javascript:;">评价为主</a>
				</li>
			</div>
			<div class="clear"></div>

			<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
				<li>
					<div class="i-pic limit">
						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic limit">

						<img src="{{asset('Home/images')}}/imgsearch1.jpg" />
						<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
						<p class="price fl">
							<b>¥</b>
							<strong>56.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
			</ul>
		</div>
		<div class="search-side">

			<div class="side-title">
				经典搭配
			</div>

			<li>
				<div class="i-pic check">
					<img src="{{asset('Home/images')}}/cp.jpg" />
					<p class="check-title">萨拉米 1+1小鸡腿</p>
					<p class="price fl">
						<b>¥</b>
						<strong>29.90</strong>
					</p>
					<p class="number fl">
						销量<span>1110</span>
					</p>
				</div>
			</li>
			<li>
				<div class="i-pic check">
					<img src="{{asset('Home/images')}}/cp2.jpg" />
					<p class="check-title">ZEK 原味海苔</p>
					<p class="price fl">
						<b>¥</b>
						<strong>8.90</strong>
					</p>
					<p class="number fl">
						销量<span>1110</span>
					</p>
				</div>
			</li>
			<li>
				<div class="i-pic check">
					<img src="{{asset('Home/images')}}/cp.jpg" />
					<p class="check-title">萨拉米 1+1小鸡腿</p>
					<p class="price fl">
						<b>¥</b>
						<strong>29.90</strong>
					</p>
					<p class="number fl">
						销量<span>1110</span>
					</p>
				</div>
			</li>

		</div>
		<div class="clear"></div>

		<!--分页 -->

		<ul class="am-pagination am-pagination-right">
			<li class="am-disabled">
				<a href="javascript:;">&laquo;</a>
			</li>
			<li class="am-active">
				<a href="javascript:;">1</a>
			</li>
			<li>
				<a href="javascript:;">2</a>
			</li>
			<li>
				<a href="javascript:;">3</a>
			</li>
			<li>
				<a href="javascript:;">4</a>
			</li>
			<li>
				<a href="javascript:;">5</a>
			</li>
			<li>
				<a href="javascript:;">&raquo;</a>
			</li>
		</ul>

	</div>
</div>


@endsection 



{{-- 页脚js代码 --}}
@section('bottom-js')

<script>
	window.jQuery || document.write('<script src="{{asset('	Home / js ')}}/jquery-1.9.min.js"><\/script>');
</script>
<script type="text/javascript" src="{{asset('Home/js')}}/quick_links.js"></script>

@endsection