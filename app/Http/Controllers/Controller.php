<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\MediaLinkType;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Build our navigation
        $links = Cache::get('links', function()
        {
            $links = MediaLinkType::where('is_active', 1)->get();
            $links = $links->pluck('name');
            $links->all();
            Cache::forever('links', $links);
            return $links;
        });

        View::share('links', $links);

    }
}
