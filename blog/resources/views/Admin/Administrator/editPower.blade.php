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
        <form action='javascript:;' class='main-form'>
            <input type="hidden" name='id' value="{{$admin_id}}" />
            @foreach ($allPower as $k => $v)
            <div class='form-group main-box'>
                <input type="checkbox" class='main-input'   />{{$k}}
            </div>
                <div class='form-group child-box'>
                 @foreach ($v as $key => $val)
                        {{$key}}<input type="checkbox" class='child-input'  name="power[]" value="{{$val['url']}}" 
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
    $('.main-form input[name="power[]"]').on('click', function () {
       checkSelect();
    })
    $('.main-input').on('click', function () {
        if ($(this).prop('checked') == true) {
             $(this).parent().next().children('.child-input').prop('checked', 'true');
        } else {
            $(this).parent().next().children('.child-input').removeAttr('checked');
        }
        checkSelect();
    })
    $('input[name="allSelect"]').click(function () {
        if ($(this).prop('checked') == true) {
            $('input[type="checkbox"]').prop('checked', 'true');
        } else {
            $('input[type="checkbox"]').removeAttr('checked');
        }
    })

$('.btn-update').on('click', function () {
    var id = $('input[name="id"]').val();
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
        url: "{{url('/admin/Administrator/updatePower')}}",
        type:'post',
        data:{"id":id,"power":power, "_token":token},
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
<script type="text/javascript">
    function checkSelect(){
        var checkbox = $('.main-form input[name="power[]"]');
        var checked = $('.main-form input[name="power[]"]:checked');
        // console.log(checkbox.length);
        // console.log(checked.length);
        
        if (checkbox.length == checked.length) {
            $('.main-form input[name="allSelect"]').prop('checked', 'checked');
        } else {
            $('.main-form input[name="allSelect"]').removeAttr('checked');
        }
    }
</script>
@if (in_array('all', $selectPower))
    <script>
        $('input[type="checkbox"]').prop('checked', 'true');
    </script>
@endif
@endsection