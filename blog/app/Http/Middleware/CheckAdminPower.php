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
                continue;
            }
            $list = unserialize(session('adminUser')['power']);
            if (!in_array($request->path(), $list)) {
               return redirect("/admin/login");
            }
        }
        return $next($request);
    }
}
