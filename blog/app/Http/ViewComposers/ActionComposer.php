<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Http\Controllers\Common\IncController;
use \Route;
class ActionComposer
{


    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        // $inc = new IncController;
        // dd(session('adminUser')['power']);
        // $action = [];
        // dd(Route::current());
        // foreach ($inc->adminAllPower as $k => $v) {
        //    foreach ($v as $key => $value) {
        //        if ($value['show'] == 0) {
        //             $action [$key] = $value['url'];
        //        }
        //    }
        // }
        // $url = unserialize(session('adminUser')['power']);
        // dd($url);
        //在视图中使用{{$count}}拿到aa
        // $view->with('aif', '123');
    }
}
