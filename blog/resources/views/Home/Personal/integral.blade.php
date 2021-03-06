@extends('Layout/personBase')


@section('title', '我的积分')

@section('css')

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
		  
		</div>
		<div class="pointshop"><a href="#"><i><img src="{{asset('Home/images/u5.png')}}" /></i>积分商城</a></div>						
		<div class="pointlist" style="padding: 0px 10px;">
			<div class="pointTitle">
				<span>积分明细</span>
			    <span class="more"><a href="{{url('/Home/integralList')}}">查看更多<i class="am-icon-angle-right"></i></a></span>
			</div>
			<table>
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
	</div>

	
	
@endsection


