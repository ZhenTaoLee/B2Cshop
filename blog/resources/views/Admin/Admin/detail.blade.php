<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" href="{{asset('/bootstrap-3.3.7/css/bootstrap.min.css')}}">
  </head>
  <body>
  @extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
  </head>
  <body>
  @endsection
@section('body')
      <div class="container">
      <div id='Common'>
 @include('Common/tip')

 </div>



        
        <form class="" action="{{url('/admin/User/update', $user->id)}}" method="post">
            {{csrf_field()}}
               序号：<td class="form-control">{{$user->id}}</td><br/><br/><br/>
               用户级别:<td class="form-control">{{$state[$user->state]}}</td><br/><br/><br/>
               用户名：<td class="form-control">{{$user->name}}</td><br/><br/><br/>
               密码：<td class="form-control">{{$user->pass}}</td><br/><br/><br/>
              总积分：<td class="form-control">{{$user->total_intergral}}</td><br/><br/><br/>
              剩余积分：<td class="form-control">{{$user->surplus_intergral}}</td><br/><br/><br/>
              性别：<td class="form-control">{{$sex[$user->sex]}}</td><br/><br/><br/>
              注册时间：<td class="form-control">{{$user->addtime}}</td><br/><br/><br/>
              电话号码：<td class="form-control">{{$user->phone}}</td><br/><br/><br/>
              邮箱：<td class="form-control">{{$user->email}}</td><br/><br/><br/>
              状态：<td class="form-control">{{$state[$user->state]}}</td><br/><br/><br/>
        </form>
      </div>
  </body>
   @endsection
</html>
