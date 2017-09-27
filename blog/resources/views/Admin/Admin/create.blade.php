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
       <form class="" action="{{url('/admin/User/store')}}" method="post">
            {{csrf_field()}}

              <!-- 伪造表单提交方式为PUT -->
             用户级别：<select name="user_level" class="form-control">
          
              <option value="1">普通用户</option>
              <option value="2">VIP用户</option>
              <option value="3">钻石用户</option>
             
              
            </select><br/><br/><br/>
            用户名：<input type="text" class="form-control" value="" name="name" /></br>
            <!--性别：<input type="text" class="form-control" value="" name="sex" /></br>-->
            性别：<select name="sex" class="form-control">
              <option value="1">女</option>
              <option value="2">男</option>
              <option value="3">保密</option>
              </select><br/><br/><br/>
            密码：<input type="text" class="form-control" name="pass"/></br>
            邮箱：<input type="text" class="form-control" name="email"/></br>
           状态：<select name="state" class="form-control">
              
             
              <option value="1">启用</option>
              <option value="2">禁用</option>

            </select><br/><br/><br/>
            电话：<input type="text" class="form-control" name="phone"/></br>
            <button type="submit" class="btn btn-success">添加</button>
        </form>
      </div>
  </body>
  @endsection
</html>
