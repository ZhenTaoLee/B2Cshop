<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 前台个人中心
 * @author wuguoqing
 *
 */

class PersonalController extends Controller
{
	//个人中心首页
    public function personal()
    { 
    	return view('Home/Personal/personal');
    }

    //个人信息
    public function information()
    { 
    	return view('Home/Personal/information');
    }

    //电话修改
    public function phoneRevise()
    { 
    	return view('Home/Personal/phoneRevise');
    }

    //邮箱修改
    public function emailRevise()
    { 
    	return view('Home/Personal/emailRevise');
    }

    //地址管理
    public function address()
    { 
    	return view('Home/Personal/address');
    }

    //修改密码
    public function passChange()
    { 
    	return view('Home/Personal/passChange');
    }

    //订单管理
    public function order()
    { 
    	return view('Home/Personal/order');
    }

    //退款售后
    public function refund()
    { 
    	return view('Home/Personal/refund');
    }

    //商品评价
    public function evaluate()
    { 
    	return view('Home/Personal/evaluate');
    }

    //我的积分
    public function integral()
    { 
    	return view('Home/Personal/integral');
    }

    //积分详情
    public function integralList()
    { 
    	return view('Home/Personal/integralList');
    }

    //收藏
    public function collection()
    { 
    	return view('Home/Personal/collection');
    }

    //足迹
    public function footprint()
    { 
    	return view('Home/Personal/footprint');
    }
}
