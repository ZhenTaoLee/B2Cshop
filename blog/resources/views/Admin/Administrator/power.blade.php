@extends('Layout/adminBase')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
@endsection
@section('body')
<div class='container'>
<table class="table table-condensed">
  <caption>权限管理</caption>
  <thead>
    <tr>
      <th>序号</th>
      <th>类别</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>商品管理员</td>
      <td><a class="btn btn-default text-success" href="/admin/Administrator/editPower">修改</a></td></tr>
    <tr>
  </tbody>
</table>
</div>
@endsection