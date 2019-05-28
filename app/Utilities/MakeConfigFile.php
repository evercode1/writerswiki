<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Artisan;
class MakeConfigFile
{


    public static function make($name)
    {

        Artisan::call('make:config', [
            'Name' => $name
        ]);

    }



}