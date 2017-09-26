@extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
<style type="text/css">
    .head-div{
        height: 70px;
    }
    .head-div .head-left{
        margin-left:20px;
    }
 
    .main-div{
        padding:50px;
    }
    .main-div .main-form{
        margin-left:230px;
    }
    .middle{
        height: 20px;
        background: #d5d5d8;
    }

</style>
@endsection
@section('body')
<div class="head-div">
    <div class='head-left'>
        <h4>添加管理员</h4>
        <a href="{{url('/admin/Administrator/power')}}" class='btn btn-primary btn-sm'>管理员列表</a>
    </div>
</div>
<div class='middle'>
    
</div>
<div class="main-div">
    <form class="form-horizontal main-form" role="form" action="javascript:;">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="username" placeholder="请输入管理员名称">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control"  name='pwd' placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control"  name='pwd2' placeholder="请输入确认密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <a  class="btn btn-success btn-add" >添加</a>
                <button type="reset" class="btn btn-default">重置</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('footer-js')
<script type="text/javascript">
    $('.btn-add').on('click', function () {
        var username = $('input[name="username"]').val();
        var pwd = $('input[name="pwd"]').val();
        var pwd2 = $('input[name="pwd2"]').val();
        var token  = "{{csrf_token()}}";
        $.ajax({
            url: "{{url('/admin/Administrator/add')}}",
            type:'post',
            data:{"username":username,"pwd":pwd,"pwd2":pwd2,"_token":token},
            dataType:'json',
            success:function (data) {
                if (data.code == 2000) {
                    var div =  "<div class='alert alert-success alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.main-div').prepend(div);
                    setTimeout(function () {                 
                        $('.alert-mess').remove();
                        location.href = "{{url('/admin/Administrator/power')}}";
                    }, 3000)
                } else {
                    var div =  "<div class='alert alert-danger alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.main-div').prepend(div);
                }            
            },
            error: function (errorText) {
                var text = JSON.parse(errorText.responseText).errors;
                var div = "<div class='alert alert-danger alert-mess'><ul>";
                for (var key in text) {
                    div += "<li>"+text[key][0]+"</li>";
                }
                div += '</ul></div>';
                $('.alert-mess').remove();
                $('.main-div').prepend(div);
            }
        })

    })
</script>
@endsection