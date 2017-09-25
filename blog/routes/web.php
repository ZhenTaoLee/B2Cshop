<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//首页
Route::get('/', 'Home\IndexController@Index');
//商品列表
Route::get('/shoplist', 'Home\IndexController@List');
//详情页
Route::get('/detail', 'Home\IndexController@Detail');
//登录页
Route::get('/login', 'Home\IndexController@Login');
//注册页
Route::get('/register', 'Home\IndexController@Register');

//注销登录并返回首页
Route::get('/logout', 'Home\IndexController@Logout');



//备用格式
//Route::get('/', '命名空间\类名@方法名');
//Route::post('/', '命名空间\类名@方法名');


//Admin


/***********后台登录模块***********/
//加载登录页面
Route::get('/admin/login', 'Admin\LoginController@login');
//登录处理
Route::post('/admin/doLogin', 'Admin\LoginController@doLogin');

/***********后台主页模块***********/
//加载后台主页
Route::get('/admin/', 'Admin\IndexController@index')->middleware('adminSession');
//头部
Route::get('/admin/Index/head', 'Admin\IndexController@head')->middleware('adminSession');
//侧面菜单
Route::get('/admin/Index/nav', 'Admin\IndexController@nav')->middleware('adminSession');
//底部
Route::get('/admin/Index/footer', 'Admin\IndexController@footer')->middleware('adminSession');
//注销
Route::get('/admin/logout', 'Api\Admin\LoginApi@logout')->middleware('adminSession');


/***********管理员管理模块***********/
//加载管理权限页面
Route::get('/admin/Administrator/power', 'Admin\AdministratorController@power');
//修改权限页面
Route::get('/admin/Administrator/editPower', 'Admin\AdministratorController@editPower')->middleware('adminPower');
//执行修改权限
Route::post('/admin/Administrator/updatePower', 'Api\Admin\AdministratorApi@updatePower');



