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


/***********个人中心***********/
//个人中心首页
Route::get('/Home/personal', 'Home\PersonalController@personal');

//个人信息
Route::get('/Home/information', 'Home\PersonalController@information');

//电话修改
Route::get('/Home/phoneRevise', 'Home\PersonalController@phoneRevise');

//邮箱修改
Route::get('/Home/emailRevise', 'Home\PersonalController@emailRevise');

//地址管理
Route::get('/Home/address', 'Home\PersonalController@address');

//修改密码
Route::get('/Home/passChange', 'Home\PersonalController@passChange');

//订单管理
Route::get('/Home/order', 'Home\PersonalController@order');

//退款售后
Route::get('/Home/refund', 'Home\PersonalController@refund');

//商品评价
Route::get('/Home/refund', 'Home\PersonalController@refund');

//我的积分
Route::get('/Home/intergral', 'Home\PersonalController@intergral');

//积分详情
Route::get('/Home/intergralList', 'Home\PersonalController@intergralList');

//收藏
Route::get('/Home/collection', 'Home\PersonalController@collection');

//足迹
Route::get('/Home/footprint', 'Home\PersonalController@footprint');





/***********后台登录模块***********/
//加载登录页面
Route::get('/admin/login', 'Admin\LoginController@login');
//登录处理
Route::post('/admin/doLogin', 'Admin\LoginController@doLogin');
//注销
Route::get('/admin/logout', 'Admin\LoginController@logout')->middleware('adminSession');

/***********后台主页模块***********/
//加载后台主页
Route::get('/admin/', 'Admin\IndexController@index')->middleware('adminSession');
//头部
Route::get('/admin/Index/head', 'Admin\IndexController@head')->middleware('adminSession');
//侧面菜单
Route::get('/admin/Index/nav', 'Admin\IndexController@nav')->middleware('adminSession');
//底部
Route::get('/admin/Index/footer', 'Admin\IndexController@footer')->middleware('adminSession');



/***********管理员管理模块***********/
//加载添加管理员页面
Route::get('/admin/Administrator/create', 'Admin\AdministratorController@create');
//执行添加管理员
Route::post('/admin/Administrator/add', 'Admin\AdministratorController@add');

//加载管理列表页面
Route::get('/admin/Administrator/power', 'Admin\AdministratorController@power');
//加载修改权限页面
Route::get('/admin/Administrator/editPower/{id}', 'Admin\AdministratorController@editPower')->where('id', '[0-9]+');
//执行修改权限
Route::post('/admin/Administrator/updatePower', 'Admin\AdministratorController@updatePower');
//加载编辑管理员页面
Route::get('/admin/Administrator/edit/{id}', 'Admin\AdministratorController@edit')->where('id', '[0-9]+');
//执行编辑管理员信息
Route::post('/admin/Administrator/doEdit', 'Admin\AdministratorController@doEdit');
//加载角色管理页面
Route::get('/admin/Administrator/role', 'Admin\AdministratorController@role');
//添加角色页面
Route::get('/admin/Administrator/createRole', 'Admin\AdministratorController@createRole');




/***********************************用户页面**************************/
//加载用户页面(有问题找黄赠有)
Route::get('/admin/User/index', 'Admin\UserController@index');
//加载用户修改页面

//这是执行添加的路由
Route::get('/admin/User/create', 'Admin\UserController@create');
//这是添加页面提价过来的路由
Route::post('/admin/User/store', 'Admin\UserController@store');

//这是处理修改的功能 点击修改便加载到Admin\UserController@show
Route::get('/admin/User/show/{id}', 'Admin\UserController@show');
//这是show这么修改页面传过来的路由
Route::post('/admin/User/update/{id}', 'Admin\UserController@update');
//查看用户详情的路由
Route::get('/admin/User/detail/{id}', 'Admin\UserController@detail');

//加载用户删除页面
Route::get('/admin/User/delete/{id}','Admin\UserController@destroy')->where(['id'=>'\d+']);
//*****************************用户管理模块完成*******************************************/





