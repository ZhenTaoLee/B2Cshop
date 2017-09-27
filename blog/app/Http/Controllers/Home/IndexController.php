<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;

class IndexController extends Controller
{
	//首页
	public function Index()
	{
		return view('Home/Index');
	} 
	// 商品列表
	public function List()
	{
		return view('Home/List');
	} 
	// 详情页
	public function Detail($gid)
	{
		$goods = Goods::where('id',$gid)->get();

		dd($goods);

		return view(
		   'Home/Detail', 
		   [ 'DetailData' => $goods]
		);
	} 
	// 注册
	public function Register()
	{
		return view('Home/Register');
	} 
	// 注销登录
	public function Logout()
	{
		return view('Home/Index');
	} 
	// 登录
	public function Login()
	{
		return view('Home/Login');
	} 
}
