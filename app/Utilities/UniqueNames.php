<?php

namespace App\Utilities;

class UniqueNames
{

    public static function filter($array, $destination)
    {

        $words = $array;

        $words = array_unique($words);


        $filename = $destination;



        foreach( $words as $key => $value){

            $contents = file($filename);
            $contents[12] = $contents[12] . "\n\n"; // Gives a new line
            file_put_contents($filename, implode('',$contents));

            $contents = file($filename);
            $contents[13] = "'" . $value . "',";
            file_put_contents($filename, implode('',$contents));

        }


    }




}