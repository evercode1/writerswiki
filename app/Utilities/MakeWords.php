<?php

namespace App\Utilities;
use App\Utilities\AdvancedRandomWordGenerator;
use App\Utilities\RandomWordGenerator;

class MakeWords
{

    public static function generate($config)
    {

        $count = $config['totalCount'];

        $words = [];

        switch ($config['type']){

            case 'advanced' :

                $generator = '\\App\Utilities\AdvancedRandomWordGenerator::makeWord';
                break;

            default:

                $generator = '\\App\Utilities\AdvancedRandomWordGenerator::makeWord';
                break;


        }

        for( $i = 0; $i < $count; $i++){

            $word = $generator($config);

            array_push($words, $word);


        }

        return $words;


    }


}