<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\IncController;
use App\Model\Admin;
use App\Http\Requests\Admin\AdministratorAddRequest;
use App\Http\Controllers\Common\CommonController;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminSession');
        // $this->middleware('adminPower');
    }

    /**
     * [power 加载管理员列表]
     * @return [object] [执行加载页面]
     */
    public function power()
    {
        $admin_user = Admin::select('id','username','addtime')->paginate(2);
        return view('Admin/Administrator/power', ['admin_user' => $admin_user]);
    }

    /**
     * [create 加载添加管理员模板]
     * @return [object] [执行加载模板]
     */
    public function create()
    {
        return view('Admin/Administrator/create');
    }

    public function add(AdministratorAddRequest $request)
    {
        $common = new CommonController;
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $pwd2 = $request->input('pwd2');

        $mod = Admin::select('username')->where('username', trim($username))->first();
        if ($mod) {
            return $common->json(1404, '管理员已添加');
        }
        if ($pwd != $pwd2 ) {
            return $common->json(1405, '两次密码不一致');
        }
        $res = Admin::insertGetId([
                'username' => trim($username),
                'pwd' => password_hash($pwd, PASSWORD_DEFAULT),
                'addtime' => time(),
            ]);
        if ($res>0) {
              return $common->json(2000, '添加成功');
        } else {
              return $common->json(1406, '添加失败');
        }

    }
     /**
     * [editPower 加载修改权限模板]
     * @return [object] [执行加载权限模板]
     */
     public function editPower(Request $request, $id)
    {
        $power = Admin::select('power')->where('id', $id)->first();
        $power = $power->toArray();
        $selectPower = [];
        foreach ($power as $k => $v) {
            if ($v == 'all') {
                 $selectPower = 'all';
                 break;
            } else {
                $selectPower = unserialize($v);

            }
        }

        $inc = new IncController;
        return view('Admin/Administrator/editPower', ['allPower' => $inc->adminAllPower,'selectPower' =>$selectPower,'admin_id' => $id]);
    }

    /**
     * [updatePower 执行修改权限]
     * @param  Request $request [请求数据]
     * @return [object] [返回修改成功或失败后重定向]
     */
    public function updatePower(Request $request)
    {

        $name = [];
        $id = $request->input('id');

        //判断是否全选权限
        if ($request->input('allSelect') != 'all') {
            //如果不是权限，遍历选中权限
            foreach ($request->except('id') as $k => $v) {
                if ($k == '_token') {
                    continue;
                }
                $name[$k] = $v;
            }
                //序列化
                $name = serialize($name);
        } else {
            //如果权限赋值‘all’值
            $name = $request->input('allSelect');
        }

        //修改数据权限字段
        $res = Admin::where('id', $id)->update(['power' => $name]);

        //判断是否成功执行重定向
        if ($res>0) {
            return redirect('/admin/Administrator/power')->with(['status'=>'修改成功']);
        } else {
            return redirect('/admin/Administrator/power')->with(['error'=>'修改失败']);
        }
    }

    
}
