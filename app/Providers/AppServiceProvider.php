<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Spatie\Sitemap\SitemapGenerator;

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
        // Config::set(['settings' => collect(Setting::all())]);
        // View::share('settings', collect(Setting::all()));
        // config('app.name', settings('site_name'));

        // SitemapGenerator::create(env('APP_URL'))->getSitemap()->writeToFile(public_path('sitemap.xml'));
    }
}