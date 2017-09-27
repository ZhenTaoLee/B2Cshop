<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lixunguan\Yuntongxun\Sdk as Yuntongxun;

class Common extends Controller
{
    public function sendPhoneMsg(request $request,$code,$templateId=1)
    {
    	// $phone=$request->input['phone'];
    	$phone2  = $request->input('phone');
    	// dd($phone2);
    	$sdk = new Yuntongxun(env('RONG_APP_ID'), env('RONG_ACCOUNT_SID'), env('RONG_AUTH_TOKEN'));


    	$code = '';
		// 生成随机验证码
		$charset = '123456789';
		$_len = strlen($charset) - 1;
			for ($i = 0;$i < 6;++$i) {
			    $code .= $charset[mt_rand(1, $_len)];
			}
		

    	// 1是短信模板， 1858842345为手机号, 第二个参数为发送的短信验证码
		$sms = $sdk->sendTemplateSMS($phone2, array($code,30), $templateId);

		// 验证码储存在session里
		session()->put('key', $code);



    }
}
