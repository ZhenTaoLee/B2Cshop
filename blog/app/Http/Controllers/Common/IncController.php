<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncController extends Controller
{
    public $adminAllPower = [];             //存储所有URL
    public function __construct()
    {
        return $this->adminAllPower = array(
            '用户管理'=>array(
                '用户列表'=>array(
                    'url'=>'admin/User/index',
                    'show'=>'1',
                    ),
                '用户添加' => array(
                        'url' => 'admin/User/create',
                        'show'=> '1'
                    )
                ),

            '商品管理'=>array(
                '商品分类' => array(
                    'url' => '1.php',
                    'show' => '1',
                    ),
                '修改商品' => array(
                    'url' => '2.php',
                    'show' => '0',
                    ),
                '商品详情' => array(
                    'url' => '3.php',
                    'show' => '1',
                    ),
            ),

            '订单管理'=>array( 
                '订单列表' => array(
                    'url' => '4.php',
                    'show'=> '1'
                    ),
                '生成订单' => array(
                    'url' => '5.php',
                    'show'=> '1'
                    )
            ),


            '管理员管理' => array(
                '管理员列表' => array(
                        'url' =>"admin/Administrator/power",
                        'show' => '1',
                        ),
                '修改权限' => array(
                        'url' => "admin/Administrator/editPower",
                        'show' => '0'
                        ),
                '编辑管理员' => array(
                        'url' => "admin/Administrator/edit,admin/Administrator/doEdit",                   
                        'show' => '0'
                        ),
                '角色管理' => array(
                    'url' => 'admin/Administrator/role',
                    'show' => '1',
                    ),
                '添加角色' => array(
                    'url' => 'admin/Administrator/roleCreate, admin/Administrator/addRole',
                    'show' => '0',
                    ),
                '编辑角色' => array(
                    'url' => 'admin/Administrator/editRole,admin/Administrator/updateRole',
                    'show' => '0',
                    ),

            ),

			
            '积分商品管理' => array(
                '积分商品表' => array(
                    'url' => '1.php',
                    'show' => '1',
                    ),
                '添加积分商品' => array(
                    'url' => '2.php',
                    'show' => '1',
                    ),
                '积分订单表' => array(
                    'url' => '3.php',
                    'show' => '1',
                    ),
            ),


        );
    }
}
