<?php

namespace App\OfferEngine;

class FormatClassString
{


    public static function formatClassName($string)
    {


        $string = ucwords($string);

        $className = '\\App\\OfferEngine\\Negotiators\\' . str_replace(' ', '',$string) . 'CounterOffer';

        return $className;


    }



}
