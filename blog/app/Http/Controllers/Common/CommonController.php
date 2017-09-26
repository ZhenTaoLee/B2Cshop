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
}
