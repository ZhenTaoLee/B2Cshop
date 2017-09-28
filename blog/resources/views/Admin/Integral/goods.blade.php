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
        <a class="btn btn-primary" href="{{url('/admin/Administrator/create')}}" target="_self">添加管理员</a>
    </div>
    <table class="table table-condensed table-bordered table-striped">
        <caption>管理员列表</caption>
        <thead>
            <tr>
                <th>序号</th>
                <th>商品名</th>
                <th>商品图片</th>
                <th>商品详情</th>
                <th>积分价格</th>
                <th>上架时间</th>
                <th>下架时间</th>
                <th width="30%" align="center">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach () 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="btn btn-default-sm" href="#">修改权限</a>
                    <a class="btn btn-default-sm" href="#">编辑</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $admin_user->links() }}
</div>
@endsection