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


        // Build our navigation
        $links = Cache::get('links', function()
        {
            $links = MediaLinkType::where('is_active', 1)->get();
            $links = $links->pluck('name');
            $links->all();
            $links = Arr::sort($links);
            Cache::put('links', $links, now()->addMinutes(10));
            return $links;
        });

        view()->share('links', $links);

        $value = \App\Utilities\Copyright::displayNotice();

        view()->share('copyright', $value);
    }
}
