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

//===========================================
//Admin
//get
Route::get('/admin/login', 'Admin\IndexController@login');
Route::get('/admin/', 'Admin\IndexController@index');

