<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;

class ApiController extends Controller
{

    // Begin Content Api Data Grid Method

    public function contentData(Request $request)
    {

        return GridQuery::sendData($request, 'ContentQuery');

    }

    // End Content Api Data Grid Method

    public function alarmData()
    {

        return AlarmQuery::sendData();

    }

    public function alarmDataAdmin()
    {

        return AlarmAdminQuery::sendData();

    }

    public function alarmSupportData()
    {

        // $data = Contact::where('status_id', 1)->count();
        // return json_encode($data);

    }


    public function userData(Request $request)
    {

        return GridQuery::sendData($request, 'UserQuery');

    }


}
