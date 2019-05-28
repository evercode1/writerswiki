<?php

namespace App\Utilities;

class AdvancedRandomWordGenerator{



    public static function makeWord($config)
    {

        $length = $config['wordLength'];
        $direction = $config['direction'];
        $vowels = $config['vowels'];
        $consonants = $config['consonants'];
        $startWith = $config['startWith'];
        $merge = $config['merge'] == 'yes' ? true : false;


        $length = rand(1, $length) * 2;

        $word    = '';

        $baseVowels = [

                       'a','e','i','o', 'ae', 'eum', 'eo', 'al',
                       'us', 'ux', 'ax', 'el', 'ar', 'or'
                ];

        $baseConsonants = [

                       'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
                       'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z',
                       'dr', 'tr', 'br', 'st', 'k', 'cr', 'kl', 'pr', 'th'
                ];

        // if we want to merge the base values, then we determine the order

        if($merge) {

            switch($direction){

                case 'seed_first' :

                    $vowels =  array_merge($vowels, $baseVowels);

                    $consonants = array_merge($consonants, $baseConsonants);
                    break;

                default:

                    $vowels =  array_merge($baseVowels, $vowels);

                    $consonants = array_merge($baseConsonants, $consonants);
                    break;

            }


        }





        // Seed it

        srand((double) microtime() * 1000000);


        $countVowels = count($vowels) - 1;

        $countConsonants = count($consonants) -1 ;


        $max = $length/2;

        switch($startWith){

            case 'vowels_first':

                for ($i = 1; $i <= $max; $i++)
                {

                    $word .= $vowels[rand(0, $countVowels)];
                    $word .= $consonants[rand(0, $countConsonants)];


                }

                return $word;
                break;

            case 'consonants_first' :

                for ($i = 1; $i <= $max; $i++)
                {
                    $word .= $consonants[rand(0, $countConsonants)];

                    $word .= $vowels[rand(0, $countVowels)];
                }

                return $word;
                break;

            default:

                return 'I did not get the start_with value';
                break;


        }





    }


}