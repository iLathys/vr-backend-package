<?php

namespace Vendor\Veeroll;

use Illuminate\Support\ServiceProvider;
use Vendor\Veeroll\Services\VideoService;

class VeerollServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('veeroll', function () {
            return new VideoService();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/veeroll.php' => config_path('veeroll.php'),
        ]);
    }
}
