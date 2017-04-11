<?php

namespace App\Providers;

use App\CauHinh;
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
        view()->composer('frontend.trangchu.danhmuc', function($view) {
            $view->with('cauhinh', CauHinh::where('order','=','2')->first());
        });
        view()->composer('menu.menu', function($view) {
            $view->with('cauhinh', CauHinh::where('order','=','1')->first());
        });
        view()->composer('menu.menu', function($view) {
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
