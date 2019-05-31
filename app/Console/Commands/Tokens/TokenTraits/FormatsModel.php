<?php

namespace App\Console\Commands\Tokens\TokenTraits;

use Illuminate\Support\Str;

trait FormatsModel
{


    private function formatModel($model)
    {
        $model = Str::camel($model);
        $model = Str::singular($model);
        return $model = ucwords($model);

    }

    private function formatModelPath($model)
    {
        $model = preg_split('/(?=[A-Z])/',$model);

        $model = implode('-', $model);

        $model = ltrim($model, '-');

        return $model = strtolower($model);

    }




}