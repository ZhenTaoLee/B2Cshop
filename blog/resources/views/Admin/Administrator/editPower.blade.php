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
        $('input[name="allSelect"]').click(function () {
            if ($(this).prop('checked') == true) {
                $('input[type="checkbox"]').prop('checked', 'true');
            } else {
                $('input[type="checkbox"]').removeAttr('checked');
            }
        })
    </script>
@if ($selectPower == 'all')
    <script>
        $('input[type="checkbox"]').prop('checked', 'true');
    </script>
@endif
@endsection