<?php

namespace App\Queries;

use Illuminate\Support\Facades\Auth;
use DB;

class AlarmAdminQuery
{

    public static function sendData()
    {



        $data = DB::table('contacts')
                ->select('contacts.id as id')
                ->where('contacts.status_id', 1)
                ->get();


        return json_encode(count($data));

    }



}