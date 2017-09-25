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
                '编辑' => array(
                        'url' => "admin/Administrator/editPower",
                        'show' => '0'
                        ),
            ),


        );
    }
}
