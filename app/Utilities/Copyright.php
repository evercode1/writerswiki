<?php

namespace App\Utilities;

class Copyright
{

    public static function displayNotice()
    {

        $date = date('Y') > 2018 ? '2018 - ' . date ('Y') : 2018;


        return '&copy ' . $date . ' &nbsp; <a href="/about">Max Vonne</a> &nbsp; All rights Reserved.';


    }

}