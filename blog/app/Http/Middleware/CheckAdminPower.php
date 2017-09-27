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
                // $url = [];
                // foreach ($list as $key => $val) {
                //     $url[] = explode(',', $val);
                // }
        
                if (!in_array($request->path(), $list)) {
                   return redirect("/admin/login");
                }
            }
        }
        return $next($request);
    }
}
