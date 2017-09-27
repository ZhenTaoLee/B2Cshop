@extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
<style type="text/css">
    .main-box{
        font-size: 20px;
        font-weight: 200;
    }
    .child-box{
        font-size: 16px;
        margin-left:40px;
    }
    .form-power{
        margin-top:20px;
        margin-left:40px;

    }

</style>
@endsection
@section('body')
<div class="container">
    <div class='form-power'>
        <form action='javascript:;' class=''>
            <input type="hidden" name='id' value="{{$admin_id}}" />
            @foreach ($allPower as $k => $v)
            <div class='form-group main-box'>
                <input type="checkbox" class='main-input'   />{{$k}}
            </div>
                    <div class='form-group child-box'>
                 @foreach ($v as $key => $val)
                        {{$key}}<input type="checkbox" class='child-input'  name="{{$key}}" value="{{$val['url']}}" 
                        @php if (in_array($val['url'], $selectPower)) {
                            echo "checked";
                          }
                        @endphp
                        />
                @endforeach
                    </div>
            @endforeach
            <div class='form-group main-box'>
                <input type="checkbox"   name="allSelect"  value="all"  />全选
            </div>
            <button class="btn btn-success btn-update">提交</button>
        </form>
    </div>
</div>
@endsection
@section('footer-js')
    <script type="text/javascript">
        $('.main-input').on('click', function () {
            if ($(this).prop('checked') == true) {
             $(this).parent().next().children('.child-input').prop('checked', 'true');
            } else {
              $(this).parent().next().children('.child-input').removeAttr('checked');
            }
        })
        $('input[name="allSelect"]').click(function () {
            if ($(this).prop('checked') == true) {
                $('input[type="checkbox"]').prop('checked', 'true');
            } else {
                $('input[type="checkbox"]').removeAttr('checked');
            }
        })

    $('.btn-update').on('click', function () {
        // var username = $('input[name="username"]').val();
        var val = $('form').serializeArray();
        console.log(val);
        var token  = "{{csrf_token()}}";
        $.ajax({
            url: "{{url('/admin/Administrator/updatePower')}}",
            type:'post',
            data:{"val":val, "_token":token},
            dataType:'json',
            success:function (data) {
                console.log(data);
                if (data.code == 2000) {
                    var div =  "<div class='alert alert-success alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.container').prepend(div);
                    setTimeout(function () {                 
                        // $('.alert-mess').remove();
                        location.href = "{{url('/admin/Administrator/power')}}";
                    }, 3000)
                } else {
                    var div =  "<div class='alert alert-danger alert-mess'>"+data.msg+"</div>";
                    $('.alert-mess').remove();
                    $('.container').prepend(div);
                }            
            },
        })

    })
    </script>
@if (in_array('all', $selectPower))
    <script>
        $('input[type="checkbox"]').prop('checked', 'true');
    </script>
@endif
@endsection