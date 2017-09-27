@extends('Layout/personBase')

@section('title', '积分明细')

@section('css')
	<link href="{{asset('/css/point.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('right')
	<div class="points">
		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的积分</strong> / <small>My&nbsp;Point</small></div>
		</div>
		<hr/>
		<div class="pointsTitle">
		   <div class="usable">可用积分<span>120</span></div>
		   <div class="pointshop"><a href="#"><i><img src="{{asset('Home/images/u5.png')}}" /></i>积分商城</a></div>
		   
		</div>
		<div class="pointlist am-tabs" data-am-tabs>
			<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
				<li class="am-active"><a href="#tab1">全部</a></li>
				<li><a href="#tab2">获得</a></li>
				<li><a href="#tab3">支出</a></li>
			</ul>
			<div class="am-tabs-bd">
				<div class="am-tab-panel am-fade am-in am-active" id="tab1">
					<table>
						<b></b>
						<thead>
							<tr>												
								<th class="th1">积分详情</th>
								<th class="th2">积分变动</th>
								<th class="th3">日期</th>
							</tr>
						</thead>										
						<tbody>
							<tr>
								<td class="pointType">积分兑换</td>
								<td class="pointNum">-80</td>
								<td class="pointTime">2016-03-10&nbsp;15:27</td>
							</tr>
							<tr>
								<td class="pointType">订单号7745926347132商品评论</td>
								<td class="pointNum">+2</td>
								<td class="pointTime">2016-03-12&nbsp;09:32</td>
							</tr>
							<tr>
								<td class="pointType">每日签到</td>
								<td class="pointNum">+5</td>
								<td class="pointTime">2016-03-12&nbsp;07:32</td>
							</tr>
							<tr>
								<td class="pointType">每日签到</td>
								<td class="pointNum">+5</td>
								<td class="pointTime">2016-03-11&nbsp;12:24</td>
							</tr>
							<tr>
								<td class="pointType">邮箱验证</td>
								<td class="pointNum">+50</td>
								<td class="pointTime">2016-03-10&nbsp;16:18</td>
							</tr>
							<tr>
								<td class="pointType">手机绑定</td>
								<td class="pointNum">+100</td>
								<td class="pointTime">2016-03-10&nbsp;15:27</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="am-tab-panel am-fade" id="tab2">
					<table>
						<b></b>
						<thead>
							<tr>												
								<th class="th1">积分详情</th>
								<th class="th2">获取积分</th>
								<th class="th3">日期</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="pointType">订单号7745926347132商品评论</td>
								<td class="pointNum">+2</td>
								<td class="pointTime">2016-03-12&nbsp;09:32</td>
							</tr>
							<tr>
								<td class="pointType">每日签到</td>
								<td class="pointNum">+5</td>
								<td class="pointTime">2016-03-12&nbsp;07:32</td>
							</tr>
							<tr>
								<td class="pointType">每日签到</td>
								<td class="pointNum">+5</td>
								<td class="pointTime">2016-03-11&nbsp;12:24</td>
							</tr>
							<tr>
								<td class="pointType">邮箱验证</td>
								<td class="pointNum">+50</td>
								<td class="pointTime">2016-03-10&nbsp;16:18</td>
							</tr>
							<tr>
								<td class="pointType">手机绑定</td>
								<td class="pointNum">+100</td>
								<td class="pointTime">2016-03-10&nbsp;15:27</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="am-tab-panel am-fade" id="tab3">
					<table>
						<b></b>
						<thead>
							<tr>												
								<th class="th1">积分详情</th>
								<th class="th2">消耗积分</th>
								<th class="th3">日期</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="pointType">积分兑换</td>
								<td class="pointNum">-300</td>
								<td class="pointTime">2016-03-10&nbsp;15:27</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>

		</div>
	</div>
@endsection