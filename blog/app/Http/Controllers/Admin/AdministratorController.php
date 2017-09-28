<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\IncController;
use App\Model\Admin;
use App\Model\Role;
use App\Http\Requests\Admin\AdministratorAddRequest;
use App\Http\Requests\Admin\AdministratorEditRequest;
use App\Http\Requests\Admin\RoleCreateRequest;
use App\Http\Controllers\Common\CommonController;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminSession');
        $this->middleware('adminPower');
    }

    /**
     * [power 加载管理员列表]
     * @return [object] [执行加载页面]
     */
    public function power()
    {
        $state = [1=>'启用', 2=>'禁用'];
        $admin_user = Admin::select('id','username','addtime','email','state')->where('id', '<>', 1)->paginate(2);
        return view('Admin/Administrator/power', ['admin_user' => $admin_user, 'state'=>$state]);
    }

    /**
     * [create 加载添加管理员模板]
     * @return [object] [执行加载模板]
     */
    public function create()
    {
        $role = Role::select('id', 'role_name')->get();
        $roleArr = $role->toArray();
        return view('Admin/Administrator/create', ['roleArr' => $roleArr]);
    }

    /**
     * [add 添加管理员]
     * @param AdministratorAddRequest $request [验证闯入数据]
     * @return [json]                 json格式返回状态码与信息 
     */
    public function add(AdministratorAddRequest $request)
    {
        $common = new CommonController;
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $pwd2 = $request->input('pwd2');
        $email = $request->input('email');
        $role = $request->input('role');
        $power = '';
        if ($role>0) {
            $role_power = Role::where('id', $role)->select('power')->first();
            $power = $role_power->power;
        }
        $mod = Admin::select('username')->where('username', trim($username))->first();
        $uemail = Admin::select('email')->where('email', trim($email))->first();

        if ($mod) {
            return $common->json(1404, '管理员已存在');
        }
        if ($uemail) {
             return $common->json(1403, '邮箱已存在');
        }
        if ($pwd != $pwd2 ) {
            return $common->json(1405, '两次密码不一致');
        }
       
        $res = Admin::insertGetId([
                'username' => trim($username),
                'pwd' => password_hash($pwd, PASSWORD_DEFAULT),
                'email' => trim($email), 
                'role_id' => $role,
                'power' => $power,
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
                $selectPower[] = 'all';
                break;
            } elseif ($v == null) {
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
        $common = new CommonController;
        $id = $request->input('id');
        $power = $request->input('power'); 
        $name = [];
        if ($power == 'all') {
            $all = 'all';
        } else {
            foreach ($power as $k=> $v) {
                $name[] = $v['value'];               
            }
        }
     
        if (isset($all)) {
            $name = $all;
        } else {
            $name = serialize($name);
        }
        // dd($name);
        //修改数据权限字段
        $res = Admin::where('id', $id)->update(['power' => $name]);

        //判断是否成功执行重定向
        if ($res>0) {
            return $common->json(2000, '修改成功');
        } else {
             return $common->json(1406, '修改失败');
        }
    }

    /**
     * [edit 加载管理员信息编辑页面]
     * @param  Request $request [请求对象]
     * @param  [int]  $id      [管理员ID]
     * @return [object]           [执行加载编辑页面]
     */
    public function edit(Request $request, $id)
    {
        $role = Role::select('id', 'role_name')->get();
        $roleArr = $role->toArray();
        //查询传入ID的管理员信息
        $admin_user = Admin::select('username','id', 'state','email','role_id')->where('id', $id)->first();
        //执行加载
        return view('Admin/Administrator/edit',['admin_user' => $admin_user, 'roleArr' => $roleArr]);
    }

    /**
     * [doEdit 编辑管理员信息]
     * @param  AdministratorEditRequest $request [检验传入数据]
     * @return [json]                            [json格式返回状态码与内容]
     */
    public function doEdit(AdministratorEditRequest $request) 
    {
        $common = new CommonController;
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $state = $request->input('state');
        $role = $request->input('role');
        $power = '';
        if ($role>0) {
            $role_power = Role::where('id', $role)->select('power')->first();
            $power = $role_power->power;
        }
        $user = Admin::select('username')->where([
            ['username', $username],
            ['id', '<>', $id],
            ])->first();
        $uemail = Admin::select('email')->where([
            ['email', trim($email)],
            ['id', '<>', $id],
            ])->first();

        if ($user) {
            return $common->json(1404, '管理员已存在');
        }
        if ($uemail) {
             return $common->json(1403, '邮箱已存在');
        }

        $res = Admin::where('id', $id)->update([
            'username' => trim($username),
            'power' => $power,
            'role_id' => $role,
            'email' => trim($email),
            'state' => $state,
            ]);
        if ($res>0) {
              return $common->json(2000, '修改成功');
        } else {
              return $common->json(1406, '修改失败');
        }
    }

    /**
     * [role 加载角色页面]
     * @return [object] [执行加载页面]
     */
    public function role()
    {
        $role = Role::select('id', 'role_name', 'describe')->get();
        $roleArr = $role->toArray();
        return view('Admin/Administrator/role', ['roleArr' => $roleArr]);
    }
    
    /**
     * [CreateRole 加载添加角色页面]
     * @return[object] [执行加载页面]
     */
    public function CreateRole()
    {
        $inc = new IncController;
        return view('Admin/Administrator/createRole', ['allPower' => $inc->adminAllPower]);
    }


    public function addRole(RoleCreateRequest $request)
    {
        $common = new CommonController;
        $name = [];
        $role_name = $request->input('role_name');

        $role = Role::select('role_name')->where('role_name', trim($role_name))->first();
        if ($role) {
             return $common->json(1404, '角色名称已经存在');
        }

        $describe = $request->input('describe');
        $val = $request->input('power');
        if ($val == 'all') {
            $all = 'all';
        } else {
            foreach ($val  as $k => $v) {
                $name[] = $v['value'];
            }
        }

        if (isset($all)) {
            $name = $all;
        } else {
            $name = serialize($name);
        }
        $res = Role::insertGetId([
                'role_name' => $role_name,
                'describe' => $describe,
                'power' => $name,
            ]);
        if ($res) {
            return $common->json(2000, '添加成功');
        } else {
            return $common->json(1401,'添加失败');
        }

    }

    /**
     * [editRole 加载修改角色页面]
     * @param  [int] $id [角色ID]
     * @return [object]     [执行加载页面]
     */
    public function editRole($id)
    {
        $inc = new IncController;
        $role = Role::where('id', $id)->select('id','role_name', 'describe', 'power')->first();
        $roleArr = $role->toArray();
        $power = unserialize($roleArr['power']);
        return view('Admin/Administrator/editRole', ['allPower' => $inc->adminAllPower, 'roleArr' => $roleArr ,'power' => $power]);
    }

     public function updateRole(RoleCreateRequest $request)
    {
        $common = new CommonController;
        $name = [];
        $id = $request->input('id');
        $role_name = $request->input('role_name');
        $describe = $request->input('describe');
        $role = Role::select('role_name')->where([
            ['role_name', trim($role_name)],
            ['id', '<>', $id],
            ])->first();
        if ($role) {
             return $common->json(1404, '角色名称已经存在');
        }     
        $val = $request->input('power');
        if ($val == 'all') {
            $all = 'all';
        } else {
            foreach ($val  as $k => $v) {
                $name[] = $v['value'];
            }
        }
        if (isset($all)) {
            $name = $all;
        } else {
            $name = serialize($name);
        }
        $res = Role::where('id', $id)->update([
                'role_name' => $role_name,
                'describe' => $describe,
                'power' => $name,
            ]);


        if ($res) {
            return $common->json(2000, '修改成功');
        } else {
            return $common->json(1401,'修改失败');
        }
       
    }

}
