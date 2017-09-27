<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{
	public function json($code,$data=[])
	{
		return response()->json([
				'status' => $code,
				
				'data' => $data,

			]);
	}

   //判断用户名的正则

   public function nameManage()
   {
   	$name = $_POST['name'];

	$patten = '/^[a-zA-Z0-9]{6,16}$/';

	    preg_match($patten,$name,$match);
		    if($match)
		    {
		        echo 1;
		    }else{
		        echo 2;
		    }
   }

   //判断手机号的正则
   
   public function phoneManage()
   {
   	$phone = $_POST['phone'];

	$patten = '/^1\d{10}$/';

	    preg_match($patten,$phone,$match);
		    if($match)
		    {
		        echo 1;
		    }else{
		        echo 2;
		    }
   }

   //判断邮箱的正则
   
   public function emailManage()
   {
   	$email = $_POST['email'];

   	$patten ='/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';

   		preg_match($patten,$email,$match);
	   		if($match)
	   		{
	   			echo 1;

	   		}else{

	   			echo 2;

	   		}
   }

// 判断手机号的正则
// 
   public function passManage()
   {
   	$pass = $_POST['pass'];

   	$patten = '/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[~!@#$%^&*])[\da-zA-Z~!@#$%^&*]{8,16}$/';

   		preg_match($patten,$pass,$match);
   			if($match)
   			{
   				echo 1;

   			}else{

   				echo 2;

   			}
   }
   //判断验证码是否正确
   
   // public function codeManage()
   // {
   //    $code = $_POST['code'];

   //    $phoneCode = TempPhone::select('id','code')
   //    ->where('code',$code)
   //    ->first(); 

   //    if ($code == $phoneCode) {
   //       echo 1;
   //    }  else {
   //       echo 2;
   //    }
   // }
   // 实现注册
   
   public function handerRegister()
   {
   	$name = $_POST['name'];
   	$pass = $_POST['pass'];
      $email= $_POST['email'];
      $phone= $_POST['phone'];
      $usercode = $_POST['code'];

      //检查用户名是否存在（只有一条数据）
         $user = User::select(['id','name','pass'])
         ->where('name',$name)
         ->first();

         // dd($user);
         if ($user) {

           return $this->json(1404);
           
         }

         //查看用户邮箱是否存在（也是只有一条数据）
         $userEmail = User::select(['id','name','email'])
         ->where('email',$email)
         ->first();
         if ($userEmail) {
            return $this->json(1405);
         }

         //查看用户手机号是否存在（也是只有一条数据）
         $userPhone = User::select(['id','name','phone'])
         ->where('phone',$phone)
         ->first();

         if ($userPhone) {
            return $this->json(1406);
         }

         //判断验证码是否匹配
         $code = session()->get('key');
         if ($usercode == $code) {

         

         } else {

            return $this->json(1408);
         }

         $bool = User::insert([
            'name'=>$name,
            'pass'=>password_hash($pass,PASSWORD_DEFAULT),
            'email'=>$email,
            'phone'=>$phone,

            ]);

         if ($bool) {
            //注册成功
            return $this->json(1200);
         } else {
            //注册失败
            return $this->json(1500);

         }
      }


}
