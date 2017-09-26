<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function Index()
    {
    	return view('Home/Index');
    } 
    public function Login()
    {
    	return view('Home/Login');
    } 
    public function List()
    {
    	return view('Home/List');
    } 
    public function Detail()
    {
    	return view('Home/Detail');
    } 
    public function Register()
    {
    	return view('Home/Register');
    } 
    public function Logout()
    {
        return view('Home/Index');
    } 

}
