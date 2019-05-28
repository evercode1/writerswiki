<?php

namespace App\Utilities;

class FetchInsideArrayFile
{

    public static function get($in)
    {


            if(is_file($in)){

                return include $in;

            }

            return false;
    }

    public static function getFirstColumnValues($file)
    {


        $outer = static::get($file);


        $names =[];


        foreach($outer as $inner){

            foreach($inner as $key => $value){

                array_push($names, $value);

            }


        }


        return $names;




    }


}
