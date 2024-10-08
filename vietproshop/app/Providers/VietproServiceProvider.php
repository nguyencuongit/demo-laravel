<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Vietpro\Vietpro;

class VietproServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton("vietpro", function(){
            return new Vietpro();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
