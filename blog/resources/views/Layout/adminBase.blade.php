<!doctype html>
<html >
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="{{asset('/assets/css/amazeui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}">
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<!-- <script src="{{asset('/assets/js/app.js')}}"></script> -->
<script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
@section('css')
      <!--  写子模板的样式 -->
@show
</head>
<body>
@section('body')

@show


</body>
@section('footer-js')
@show
</html>
