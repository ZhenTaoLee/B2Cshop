@extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">


@endsection
@section('body')
<div class='container'>
<div id='Common'>
 @include('Common/tip')

 </div>


<script>
  //一次性定时器 让错误提示2秒后消失
 setTimeout(function () {
      

      var common = document.getElementById('Common');

      common.style.display = 'none';

    }, 2000);
</script>

<table class="table table-condensed">
  <caption>用户管理</caption>
  <thead>
    <tr>
      <th>序号</th>
      <th>用户级别</th>
      <th>用户名</th>
      
      <th>性别</th>
      <th>总积分</th>
      <th>剩余积分</th>
      <th>电话</th>
      <th>邮箱</th>
      <th>状态</th>
      
     
      
      <th class="oprit">操作</th>
    </tr>
  </thead>
  <tbody>

@foreach($user as $v)

    <tr align="center">
          <td>{{$v->id}}</td>
          <td>{{$user_level[$v->user_level]}}</td>
          <td>{{$v->name}}</td>
          <td>{{$sex[$v->sex]}}</td>
          <td>{{$v->total_intergral}}</td>
          <td>{{$v->surplus_intergral}}</td>
          <td>{{$v->phone}}</td>
          <td>{{$v->email}}</td>
          <td>{{$state[$v->state]}}</td>
          <td>
            <a  class="btn btn-success" href="{{url('/admin/User/delete',$v->id)}}">删除</a>
           <a  class="btn btn-success" href="{{url('/admin/User/show', $v->id)}}">编辑</a>
           <a  class="btn btn-success" href="{{url('/admin/User/detail', $v->id)}}">查看详情</a>
          </td>
        
 
      </tr>
     
    @endforeach
    
    </tr>

  </tbody>
  
</table>
 {{$user->links()}}


</div>
@endsection