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


<script>
  //一次性定时器 让错误提示2秒后消失
 setTimeout(function () {
      

      var common = document.getElementById('Common');

      common.style.display = 'none';

    }, 2000);
</script>

        
        <form class="" action="{{url('/admin/User/update', $user->id)}}" method="post">
            {{csrf_field()}}

              <!-- 伪造表单提交方式为PUT -->
             <!-- 用户级别：<input type="text" class="form-control" value="{{$user->user_level}}" name="user_level" /><br/>-->
               用户级别：<select name="user_level" class="form-control">
              
              <!--<option value="{{$user->sex}}"></option>
              <option value="2">男</option>
              <option value="3">保密</option>-->
              <option value="1"<?php echo $user_level==1?"selected":" ";?>>普通用户</option>
              <option value="2"<?php echo $user_level==2?"selected":" ";?>>VIP用户</option>
              <option value="3"<?php echo $user_level==3?"selected":" ";?>>钻石用户</option>
             
              
            </select><br/><br/><br/>
           用户名：<input type="text" class="form-control" value="{{$user->name}}" name="name" /><br/>
          密码：<input type="text" class="form-control" value="{{$user->pass}}" name="pass" /><br/>
         <!-- 性别：<input type="text" class="form-control" value="{{$user->sex}}" name="sex" /><br/>-->
          性别：<select name="sex" class="form-control">
              
              <!--<option value="{{$user->sex}}"></option>
              <option value="2">男</option>
              <option value="3">保密</option>-->
              <option value="1"<?php echo $sex==1?"selected":" ";?>>女</option>
              <option value="2"<?php echo $sex==2?"selected":" ";?>>男</option>
              <option value="3"<?php echo $sex==3?"selected":" ";?>>保密</option>
             
              
            </select><br/><br/><br/>
          电话：<input type="text" class="form-control" value="{{$user->phone}}" name="phone" /><br/>
          邮箱：<input type="text" class="form-control" value="{{$user->email}}" name="email" /><br/>
          <!--状态：<input type="text" class="form-control" value="{{$user->state}}" name="state" /><br/>-->
           状态：<select name="state" class="form-control">
              
             
              <option value="1"<?php echo $state==1?"selected":" ";?>>启用</option>
              <option value="2"<?php echo $state==2?"selected":" ";?>>禁用</option>
              
             
              
            </select><br/><br/><br/>
            <button type="submit" class="btn btn-success">修改</button>
        </form>
      </div>
  </body>
   @endsection
</html>
