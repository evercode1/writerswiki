<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Artisan;
class MakeSeedsFile
{


    public static function make($name)
    {

        Artisan::call('make:seeds', [
            'Name' => $name
        ]);

    }



}