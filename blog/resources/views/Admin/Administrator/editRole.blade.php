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
/*    .main-div .main-form{
        margin-left:230px;
    }*/
    .middle{
        height: 20px;
        background: #d5d5d8;
    }
    .checkbox-head{

    }

</style>
@endsection
@section('body')
<div class="head-div">
    <div class='head-left'>
        <h4>修改角色</h4>
        <a href="{{url('/admin/Administrator/role')}}" class='btn btn-primary btn-sm'>角色列表</a>
    </div>
</div>
<div class='middle' >
    
</div>
<div class="main-div">
    <form class="form-horizontal main-form" role="form" action="javascript:;">
      <input type='hidden' name='rid' value="{{ $roleArr['id'] }}"/>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="role_name" value="{{ $roleArr['role_name'] }}" placeholder="角色名称">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">角色描述</label>
            <div class="col-sm-5">
                <textarea type="text" class="form-control" name="describe"  placeholder="描述">{{ $roleArr['describe'] }}</textarea>
            </div>
        </div>
        <table class='table table-bordered '>
            <caption>权限设置</caption>
            @foreach ($allPower as $k => $v) 
                <tr>
                    <td>
                        <div class="checkbox-head">
                                <input type="checkbox" class="list-main" name=""><span style="font-size: 17px">{{$k}}</span>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            @foreach ($v as $key=>$val)
                            <div class="col-sm-2">
                                <input type="checkbox" class="child-box" name="power[]" value="{{$val['url']}}" 
                                @php if(in_array($val['url'], $power))
                                echo 'checked';
                                @endphp
                                >{{$key}}
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="form-group">
             <div class="col-sm-2">
                    <input type="checkbox" class="form" name="allSelect"  value="all">全选
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <a  class="btn btn-success role-edit" >修改</a>
                <button type="reset" class="btn btn-default">重置</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('footer-js')
<script type="text/javascript">
    $('.main-form input[name="power[]"]').on('click', function () {
       checkSelect();
    })
    $('.list-main').click(function () {
        if ($(this).prop('checked') == true) {
            $(this).parent().parent().next().find('.child-box').prop('checked', 'true');
        } else {
             $(this).parent().parent().next().find('.child-box').removeAttr('checked');
        }
        checkSelect();
    })
    $('.main-form input[name="allSelect"]').click(function () {
        if ($(this).prop('checked') == true) {
            $('.main-form input[type="checkbox"]').prop('checked', 'true');
        } else {
            $('.main-form input[type="checkbox"]').removeAttr('checked');
        }
    })

    $('.role-edit').on('click', function () {
        var rid = $('input[name="rid"]').val();
        var role_name = $('input[name="role_name"]').val();
        var describe = $('textarea[name="describe"]').val();
        var checkbox = $('.main-form input[name="power[]"]');
        var checked = $('.main-form input[name="power[]"]:checked');
        var power = '';
        if (checkbox.length == checked.length ) {
            power = 'all';
        } else {
            power = $('.main-form input[name="power[]"]:checked').serializeArray();
        }
        var token  = "{{csrf_token()}}";
        $.ajax({
            url: "{{url('/admin/Administrator/updateRole')}}",
            type:'post',
            data:{"id":rid,"role_name":role_name,"describe":describe,"power":power, "_token":token},
            dataType:'json',
            success:function (data) {
                if (data.code == 2000) {
                    var div =  "<div id='lid' class='alert alert-success alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.main-div').prepend(div);
                    location.href = "#lid";
                    setTimeout(function () {                 
                        location.href = "{{url('/admin/Administrator/role')}}";
                    }, 3000)
                } else {
                    var div =  "<div id='lid' class='alert alert-danger alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.main-div').prepend(div);
                    location.href = "#lid";
                }            
            },
             error: function (errorText) {
                var text = JSON.parse(errorText.responseText).errors;
                var div = "<div id='lid' class='alert alert-danger alert-mess'><ul>";
                if (text) {
                    for (var key in text) {
                        div += "<li>"+text[key][0]+"</li>";
                    }
                } else {
                       div += "<li>"+"未知错误"+"</li>";
                }
                div += '</ul></div>';
                $('.alert-mess').remove();
                $('.main-div').prepend(div);
                location.href = "#lid";
            }
        })

    })
</script>
<script type="text/javascript">
    function checkSelect(){
        var checkbox = $('.main-form input[name="power[]"]');
        var checked = $('.main-form input[name="power[]"]:checked');
        if (checkbox.length == checked.length) {
            $('.main-form input[name="allSelect"]').prop('checked', 'checked');
        } else {
            $('.main-form input[name="allSelect"]').removeAttr('checked');
        }
    }
</script>

@endsection