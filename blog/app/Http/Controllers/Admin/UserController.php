<?php

namespace App\Http\Controllers\Admin;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use  App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //index方法是执行用户的查看功能  
    public function index()
    {
        //
        $user = DB::table('user')->select(['id','user_level','name','sex','total_intergral','surplus_intergral','phone','email','state','addtime'])->paginate(3);
       //dd($user);
       // $users = array($user);
       // var_dump($users);
       // var_dump($users->name);
        $sex= ['1'=>"女","2"=>"男", '3'=>'保密'];
        $user_level=["1"=>"普通用户","2"=>"VIP用户","3"=>"钻石用户"];
        $state=["1"=>"启用","2"=>"禁用"];
       //$user = $user->toArray(); 
       // dd($user);
         return view('Admin/Administrator/user',['user'=>$user,"sex"=>$sex,"user_level"=>$user_level,"state"=>$state]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //create是返回添加的页面;
    public function create()
    {
        //
        //dd('32121');
         return view('Admin/Administrator/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //这是执行添加的页面
    public function store(Request $request)
    {
        //
       //name 的正则：可有数字 大写字母 和小写字母 长度在6-16位之间
        $user_level = $request->input('user_level');
          $name = $request->input('name');
          //用户名不能为空
          if(!$name) {
             return back()->with('errorTip','用户名不能为空');
          }

          $patten = '/^[a-zA-Z0-9]{6,16}$/';
           preg_match($patten,$name,$match);
            if(!$match)
            {
               return back()->with('errorTip','用户名不规范');
            }
           


            $sex = $request->input('sex');
            //dd($sex);
            if(!$sex) {
             return back()->with('errorTip','性别不能为空');
          }



   //正则:pass一定要数字 字母 特殊符号 长度在8-16位之间
        $pass = $request->input('pass');
        //密码不能为空
         if(!$pass) {
             return back()->with('errorTip','密码不能为空');
          }
        
        $patten = '/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[~!@#$%^&*])[\da-zA-Z~!@#$%^&*]{8,16}$/';
        preg_match($patten,$pass,$match);
            if(!$match)
            {
                return back()->with('errorTip','密码不规范');
            }

         //邮箱的正则
         $email = $request->input('email');
          if(!$email) {
             return back()->with('errorTip','邮箱不能为空');
          }
         $patten ='/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';

        preg_match($patten,$email,$match);
            if(!$match)
                 {
                return back()->with('errorTip','邮箱不规范');
            }


            $state = $request->input('state');
            //手机号码的正则：
          $phone = $request->input('phone');
           if(!$phone) {
             return back()->with('errorTip','电话不能为空');
          }
          $patten = '/^((0?1[358]\d{9})|((0(10|2[1-3]|[3-9]\d{2}))?[1-9]\d{6,7}))$/';

        preg_match($patten,$phone,$match);
           if(!$match)
                 {
                return back()->with('errorTip','电话不规范');
            }
        //dd($pass);
      $insert = User::insertGetId([
          'user_level' => $user_level,
          'name' => $name,
          'sex' =>$sex,
          'pass' => $pass,
          'email'=>$email,
          'state'=>$state,
          'phone'=>$phone,
          'session_id'=>1,
           'addtime'=>date('y-m-d h:i:s',time())
        ]);
     // dd($insert==true);
     
      if($insert==true){

      return ('添加成功');

  }else{

  }
      
        return back()->with('errorTip','添加失败');

    }
    

    /**
     * Display the specified resource.
     *$oneUser是拿到想要编辑的数据
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show 方法拿到用户传过来的id来查询数据库 查到的值传到show页面
    public function show($id)
    {
        //
       // dd($id);
        $oneUser = DB::table('user')->select(['id','user_level','name','pass','sex','phone','email','state'])->where('id',$id)->first();
        //dd($oneUser);
        //$user = $oneUser->toArray(); 
        //dd($oneUser->sex);
        //$sex= ['1'=>"女","2"=>"男", '3'=>'保密'];

            $sex = $oneUser->sex;
            $state = $oneUser->state;
            $user_level = $oneUser->user_level;
            //dd($user_level);
            // /dd($state);
            //dd($sex);
        return view('Admin/Administrator/show',['user'=>$oneUser,'sex'=>$sex,'state'=>$state,'user_level'=>$user_level]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        //dd($id);
         $user = DB::table('user')->select(['id','user_level','name','pass','total_intergral','surplus_intergral','sex','phone','email','state','addtime'])->where('id',$id)->first();
        //dd($user);
        //dd($oneUser);
        //$user = $oneUser->toArray(); 
        //dd($oneUser->sex);
        //$sex= ['1'=>"女","2"=>"男", '3'=>'保密'];

                               $sex= ['1'=>"女","2"=>"男", '3'=>'保密'];
                                $user_level=["1"=>"普通用户","2"=>"VIP用户","3"=>"钻石用户"];
                              $state=["1"=>"启用","2"=>"禁用"];
            //dd($user_level);
            // /dd($state);
            //dd($sex);
        return view('Admin/Administrator/detail',['user'=>$user,"sex"=>$sex,"state"=>$state,"user_level"=>$user_level]);
    }

    /**
     * Update the specified resource in storage.
     *update 方法做的是修改功能 $id是点击修改传过来的id  $request 点击修改传过来的所有值
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //dd($request);
        $user_level=$request->input('user_level');

         $name=$request->input('name');
          if(!$name) {
             return back()->with('errorTip','用户名不能为空');
          }

          $patten = '/^[a-zA-Z0-9]{6,16}$/';
           preg_match($patten,$name,$match);
            if(!$match)
            {
               return back()->with('errorTip','用户名不规范');
            }
            $pass=$request->input('pass');

            $sex=$request->input('sex');
             if(!$sex) {
             return back()->with('errorTip','性别不能为空');
          }

          //修改电话的正则
            $phone=$request->input('phone');
            //dd($phone);
             if(!$phone) {
             return back()->with('errorTip','电话不能为空');
          }
         //$patten = '/^1\d{10}$/ ';
         $patten = '/^((0?1[358]\d{9})|((0(10|2[1-3]|[3-9]\d{2}))?[1-9]\d{6,7}))$/';

        preg_match($patten,$phone,$match);
        //dd($match);
           if(!$match)
                 {
                return back()->with('errorTip','电话不规范');
            }

            //修改邮箱的正则
            $email=$request->input('email');
             if(!$email) {
             return back()->with('errorTip','邮箱不能为空');
          }
         $patten ='/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';

        preg_match($patten,$email,$match);
            if(!$match)
                 {
                return back()->with('errorTip','邮箱不规范');
            }
            $state=$request->input('state');

        //id','user_level','name','pass','sex','phone','email','state
         $bool = DB::table('user')
        ->where('id',$id)
        ->update([
            'user_level'=>$user_level,
            'name'=>$name,
            'pass'=>$pass,
            'sex'=>$sex,
            'phone'=>$phone,
            'email'=>$email,
            'state'=>$state
           
            ]);
        //dd($bool);

        if($bool!==0) {
            
             return redirect('/admin/User/index')->with('msg','修改成功');
           
        }
         return redirect('/admin/User/index')->with('errorTip','修改失败');
            
       
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        //
         $bool = DB::table('user')->where('id',$id)->delete();

        //return back()->with('msg','删除成功');
         return redirect('/admin/User/index')->with('msg','删除成功');
    }
}
