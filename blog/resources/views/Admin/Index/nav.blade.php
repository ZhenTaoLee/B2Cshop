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
      
       $('.sideMenu h3').click(function() {
            $(this).next().toggle();
       })
    </script> 

    
    
    
    
    
    
    
    </div>
<div>
@endsection