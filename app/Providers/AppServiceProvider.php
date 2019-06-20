<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;
use App\MediaLinkType;
use Illuminate\Support\Arr;

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

        Schema::defaultStringLength(191);

        Cache::flush('links');

        // Build our navigation
        $navs = Cache::get('navs', function()
        {
            $navs = MediaLinkType::where('is_active', 1)->get();
            $navs = $navs->pluck('name');
            $navs->all();
            $navs = Arr::sort($navs);
            Cache::put('navs', $navs, now()->addMinutes(10));
            return $navs;
        });

        view()->share('navs', $navs);

        $value = \App\Utilities\Copyright::displayNotice();

        view()->share('copyright', $value);
    }
}
