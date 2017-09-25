<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\IncController;
use App\Model\Admin;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminSession');
        // $this->middleware('adminPower');
    }
    public function power()
    {
        return view('Admin/Administrator/power');
    }
    /**
     * [editPower 加载修改权限模板]
     * @return [function] [执行加载权限模板]
     */
     public function editPower()
    {
        $inc = new IncController;
        return view('Admin/Administrator/editPower', ['allPower' => $inc->adminAllPower]);
    }

    /**
     * [create 加载添加管理员模板]
     * @return [function] [执行加载模板]
     */
    public function create()
    {
        return view('Admin/Administrator/create');
    }
    /**
     * [updatePower description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updatePower(Request $request)
    {
        $name = [];
        // unserialize($name)
        foreach ($request->input() as $k => $v) {
            if ($k == '_token') {
                continue;
            }
            $name[$k] = $v;
        }
        $name = serialize($name);
        $res = Admin::where('id', 1)->update(['power' => $name]);

        if ($res>0) {
            return redirect('/admin/Administrator/editPower')->with(['status'=>'修改成功']);
        } else {
            return redirect('/admin/Administrator/editPower')->with(['error'=>'修改失败']);
        }
    }
}
