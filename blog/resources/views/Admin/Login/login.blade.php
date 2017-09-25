<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <style type="text/css">
        .login-form{
            position: relative;
            left: 300px;
            top:150px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
            width: 500px;
        }
    </style>
</head>
<body>
</html>

<body >
    <div class="container">


        <div class='login-form'>
            <form class="form-horizontal" role="form" action='javascript:;'>
           
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' placeholder="请输入名字">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                     <input type="password" class="form-control" name='pwd' placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                   <button  class="btn btn-primary" id='dologin'>登录</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $('#dologin').on('click', function () {
        var user = $('input[name="username"]').val();
        var pwd = $('input[name="pwd"]').val();
        var token  = "{{csrf_token()}}";
        $.ajax({
            type:'post',
            url:"{{url('/admin/doLogin')}}",
            data:{"username":user, "pwd":pwd, "_token":token },
            dataType:'json',
            success:function (data) {
                console.log(data);
              
                if (data.code == 1401) {
                    var div = "<div class='alert alert-danger alert-tip'>"+data.msg+'</div>';
                } else if (data.code == 1402) {
                     var div = "<div class='alert alert-danger alert-tip'>"+data.msg+'</div>';
                } else if (data.code == 2000) {
                     var div = "<div class='alert alert-success alert-tip'>"+data.msg+'</div>';
                }

                $('.alert-tip').remove();
                $('.container').prepend(div);
                if (data.code == 2000) {
                     setTimeout(function () {
                      location.href = "{{url('/admin/')}}";
                    }, 3000);
                }
            },
            error: function (errorText) {
                var text = JSON.parse(errorText.responseText).errors;
                var div = "<div class='alert alert-danger alert-dologin'><ul>";
                for (var key in text) {
                    div += "<li>"+text[key][0]+"</li>";
                }
                div += '</ul></div>';
                $('.alert-dologin').remove();
                $('.container').prepend(div);
               
            }
        })
    })
</script>

