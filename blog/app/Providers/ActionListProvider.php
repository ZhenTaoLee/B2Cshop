<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ActionListProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

            Blade::directive('action', function ($route) {
                return "<?php if(\"App\Http\Controllers\Common\CommonController\"::hasPower($route)) { ?>";
            });
            Blade::directive('endaction', function () {
                return "<?php } ?>";
            });
    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
