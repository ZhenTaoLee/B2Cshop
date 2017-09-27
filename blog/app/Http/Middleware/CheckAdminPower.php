<?php

namespace App\Http\Middleware;
use  App\Http\Controllers\Common\IncController;
use Closure;

class CheckAdminPower
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $inc = new IncController;
        if (session('adminUser')['id'] != 1) {
            if (session('adminUser')['power'] == 'all') {
                $list = $inc->adminAllPower;
            } else {

                $list = unserialize(session('adminUser')['power']);
                $url = [];
                foreach ($list as $key => $val) {
                    $url[] = explode(',', $val);
                }
                $name =[];
                foreach($url as $k => $v) {
                    foreach ($v as $key => $val) {
                        $name[] =$val;
                    }
                }
                if (!in_array($request->path(), $name)) {
                   return redirect("/admin/login");
                }
            }
        }
        return $next($request);
    }
}
