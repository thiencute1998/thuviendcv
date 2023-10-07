<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Link;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        $bannerApp = Banner::where('status', 1)->first();
        // Logo
        $logoWebsite = Banner::where('status', 1)->where('type', 5)->first();
        View::composer('*', function ($view) use($bannerApp,$logoWebsite){
            $user = auth()->user();

            $data = [
                'userLogin'=> $user,
                'bannerApp'=> $bannerApp,
                'logoWebsite'=> $logoWebsite
            ];
            $view->with($data);
        });

    }
}
