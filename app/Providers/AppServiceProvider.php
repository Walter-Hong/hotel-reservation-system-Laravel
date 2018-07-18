<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Validation\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Factory $validator)
    {
        view()->share('setting', Setting::first());

        require_once app_path() . '/validators.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
