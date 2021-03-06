<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\IncController;



class IndexController extends Controller
{
    public $admin_show = [];                  //存储显示菜单栏URL
    public $admin_Power = [];              //存储有权限显示在列表页
    /**
     * 加载后台首页
     * @return [function] [执行加载模板]
     */
    public function index()
    {
        return view('Admin/Index/index');
    }

    /**
     * 加载头部页面
     * @return [function] [执行加载模板]
     */
    public function head()
    {
        return view('Admin/Index/head');
    }

    /**
     * 加载侧面菜单页面
     * @return [function] [执行加载模板]
     */
    public function nav()
    {
        $inc = new IncController;
        foreach ($inc->adminAllPower as $k => $v) {
               foreach ($v as $key => $val) {             
                    if ($val['show'] == 1) {
                        $this->admin_show[$k][$key]= $val['url'];
                    }
               }
        }
        if (session('adminUser')['id'] == 1 || session('adminUser')['power'] == 'all') {
            $this->admin_Power = $this->admin_show;
        }  else {
             $list = unserialize(session('adminUser')['power']);
            
            foreach ($this->admin_show as $k=>$v) {
                foreach ($v as $k1=> $v1) {
                        if (in_array($v1, $list)) {
                            $this->admin_Power[$k][$k1] = $v1;
                       } 
                }
            }

        }
        return view('Admin/Index/nav', ['admin_Power' =>$this->admin_Power]);
    }

    /**
     * 加载底部页面
     * @return [function] [执行加载模板]
     */
    public function footer()
    {
        return view('Admin/Index/footer');
    }
}
