<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Config;
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

//        $bannerApp = Banner::where('status', 1)->first();
//        // Logo
//        $logoWebsite = Banner::where('status', 1)->where('type', 5)->first();
//        $contactFooter = About::first();
//        //Config
//        $config = Config::first();
//        $links = Link::where('status',1)->orderBy('created_at', 'asc')->get();
//        $categories = Category::where('status', 1)->where('level', 1)->get();
//        View::composer('*', function ($view) use($bannerApp,$logoWebsite, $contactFooter, $config, $links, $categories){
//            $user = auth()->user();
//
//            $data = [
//                'userLogin'=> $user,
//                'bannerApp'=> $bannerApp,
//                'logoWebsite'=> $logoWebsite,
//                'contactFooter'=> $contactFooter,
//                'config'=> $config,
//                'linkmn'=> $links,
//                'categoriemn'=> $categories
//            ];
//            $view->with($data);
//        });

    }
}
