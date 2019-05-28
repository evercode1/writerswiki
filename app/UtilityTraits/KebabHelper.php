<?php

namespace App\UtilityTraits;

trait KebabHelper
{


    public static function formatString($string)
    {

        $string = strtolower(str_replace(" ","-", $string));

        return $string;



    }




}