<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Artisan;
class AppendSeedsFile
{


    public static function make($name, $group, $syllables=[])
    {

        Artisan::call('append:seeds', [
            'SeedsName' => $name,
            'GroupTitle' => $group,
            'syllables' => $syllables
        ]);

    }



}