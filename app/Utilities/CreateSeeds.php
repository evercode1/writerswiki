<?php

namespace App\Utilities;

class CreateSeeds
{


    public Static function generate(Array $config)
    {


        MakeSeedsFile::make($config['name']);


        $words = MakeWords::generate($config);

        $filename = base_path('/seeds/' . $config['name'] . '.php');



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