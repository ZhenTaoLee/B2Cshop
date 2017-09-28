<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * [json 以json格式响应]
     * @param  [int] $code [状态码]
     * @param  [string] $msg  [信息内容]
     * @param  array  $data [其他返回内容]
     * @return [object]       [j响应json数据]
     */
    public function json($code, $msg, $data = [])
    {
        return response()->json([
            'code' => $code,
            'msg'    => $msg,
            'data'  => $data,
        ]);
    }

    public static function hasPower($route){
        if (session('adminUser')['id'] != 1 || session('adminUser')['power'] != 'all') {
            $url = unserialize(session('adminUser')['power']);
            $action = [];
            foreach ($url as $k => $v) {
                $action[] = explode(',', $v);
            }
            $name = [];
            foreach ($action as $key => $val) {
                foreach($val as $v) {
                    $name[] = $v; 
                }
            }
            if (!in_array($route, $name)) {
                return false;
            } 
        }
        return true;
    }
}
