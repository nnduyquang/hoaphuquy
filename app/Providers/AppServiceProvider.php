<?php

namespace App\Providers;

use App\DanhMuc;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Schema::defaultStringLength(191);
        view()->composer('frontend.trangchu.danhmuc', function($view) {
            $view->with('danhmucs', DanhMuc::all()->sortBy('id'));
        });
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
