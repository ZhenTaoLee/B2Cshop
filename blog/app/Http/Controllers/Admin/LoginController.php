<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Model\Admin;

/**
 * @author 
 */
class LoginController extends Controller
{
    /**
     * 加载后台登录页面
     * @return [function] 执行加载模板
     */
    public function login()
    {
        return view('Admin/Login/login');
    }

    /**
     * 处理登录验证
     * @param  login  $request [登录请求验证]
     * @return json       [返回状态码与信息]
     */
    public function doLogin(LoginRequest $request)
    {
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $mod = Admin::select('id','username','pwd', 'power')->where('username', $username)->first();
              
        if (!$mod) {
            return response()->json([
                'code' => 1401,
                'msg' => '用户名不存在或密码错误',
                ]);
        }
        if (!password_verify($pwd, $mod->pwd)) {
            return response()->json([
                'code' => 1402,
                'msg' => '用户名不存在或密码错误',
                ]);
        }
        session(['adminUser' => ["username"=>$mod->username,'power'=>$mod->power]]);

    
        return response()->json([
                'code' => 2000,
                'msg' => '登录成功',
            ]);

    }
     public function logout(Request $request)
     {
        $request->session()->forget('adminUser');
        $request->session()->forget('adminPower');
        return redirect('/admin/login');
     }
}
