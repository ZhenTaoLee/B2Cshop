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

Route::get('/', function () {
    return view('Home/Index');
});
Route::get('/shoplist', function () {
     return view('Home/List');
});

//===========================================
//Admin
//get
Route::get('/admin/login', 'Admin\IndexController@login');
Route::get('/admin/', 'Admin\IndexController@index');

