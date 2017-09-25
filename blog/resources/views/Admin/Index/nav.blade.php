@extends('Layout/adminBase')
@section('css')
<!-- <link rel="stylesheet" href="{{asset('/bootstrap-3.3.7/css/bootstrap.min.css')}}"> -->

@endsection
@section('body')
<div class="am-cf admin-main" style="height:600px; "> 

<div class="nav-navicon admin-main admin-sidebar">
    
    
    <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;"> 
    {{Session::get('adminUser')["username"] }}
    </div>
    <div  style="color:#aeb2b7; margin-left:10px;"> 
    <a href="{{url('/admin/logout')}}" target="_parent">注销</a>
    </div>
    <div class="sideMenu"> 
    @foreach ($admin_Power as $key => $val)
      <h3><em></em> <a>{{$key}}</a></h3>
      <ul>
        @foreach ($val as $k => $v) 
        <li><a href="{{url($v)}}" target="main">{{$k}}</a></li>
        @endforeach
      </ul>
      @endforeach
 
    </div>
    <!-- sideMenu End --> 
    
    <script type="text/javascript">
      // jQuery(".sideMenu").slide({
      //   titCell:"h3", //鼠标触发对象
      //   targetCell:"ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
      //   effect:"slideDown", //targetCell下拉效果
      //   delayTime:300 , //效果时间
      //   triggerTime:150, //鼠标延迟触发时间（默认150）
      //   defaultPlay:true,//默认是否执行效果（默认true）
      //   returnDefault:true //鼠标从.sideMen移走后返回默认状态（默认false）
      //   });
       $('.sideMenu h3').click(function() {
            $(this).next().toggle();
       })
    </script> 

    
    
    
    
    
    
    
    </div>
<div>
@endsection