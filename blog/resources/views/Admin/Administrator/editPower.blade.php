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
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class='form-power'>
        <form action='/admin/Administrator/updatePower' method="post" class=''>
            {{csrf_field()}}
            @foreach ($allPower as $k => $v)
            <div class='form-group main-box'>
                <input type="checkbox" class='main-input'   />{{$k}}
            </div>
                    <div class='form-group child-box'>
                 @foreach ($v as $key => $val)
                        {{$key}}<input type="checkbox" class='child-input'  name="{{$key}}" value="{{$val['url']}}" />
                @endforeach
                    </div>
            @endforeach
            <button class="btn btn-success">提交</button>
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
    </script>
@endsection