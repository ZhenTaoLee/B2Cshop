@extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
<style type="text/css">
    tr{
        text-align: center;
    }
    tr th{
         text-align: center;
    }
</style>
@endsection
@section('body')
<div class='container'>
    <div>
        <a class="btn btn-primary" href="{{url('/admin/Administrator/createRole')}}" target="_self">添加角色</a>
    </div>
    <table class="table table-condensed table-bordered table-striped">
        <caption>角色管理</caption>
        <thead>
            <tr>
                <th>序号</th>
                <th>角色</th>
                <th>角色描述</th>
                <th width="30%" align="center">操作</th>
            </tr>
        </thead>
        <tbody>
       
    
        </tbody>
    </table>

</div>
@endsection
