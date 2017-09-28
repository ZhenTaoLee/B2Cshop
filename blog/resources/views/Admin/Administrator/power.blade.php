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
        @action('admin/Administrator/create')
        <a class="btn btn-primary" href="{{url('/admin/Administrator/create')}}" >添加管理员</a>
        @endaction
    </div>
    <table class="table table-condensed table-bordered table-striped">
        <caption>管理员列表</caption>
        <thead>
            <tr>
                <th>序号</th>
                <th>管理员</th>
                <th>邮箱</th>
                <th>状态</th>
                <th>加入时间</th>
                <th width="30%" align="center">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin_user as $k => $v) 
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->email}}</td>
                <td>{{$state[$v->state]}}</td>
                <td>{{date("Y-m-d H:i:s",$v->addtime)}}</td>
                <td>
                    @action('admin/Administrator/editPower')
                    <a class="btn btn-default-sm" href="/admin/Administrator/editPower/{{$v->id}}">修改权限</a>
                    @endaction
                    @action('admin/Administrator/edit')
                    <a class="btn btn-default-sm" href="/admin/Administrator/edit/{{$v->id}}">编辑</a>
                    @endaction
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $admin_user->links() }}
</div>
@endsection
