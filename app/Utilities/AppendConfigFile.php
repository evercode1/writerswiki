<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Artisan;
class AppendConfigFile
{


    public static function make($name, $group, $syllables=[])
    {

        Artisan::call('append:config', [
            'ConfigName' => $name,
            'GroupTitle' => $group,
            'syllables' => $syllables
        ]);

    }



}