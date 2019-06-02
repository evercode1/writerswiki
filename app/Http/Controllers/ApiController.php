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



    



    



    public function userData(Request $request)
    {

        return GridQuery::sendData($request, 'UserQuery');

    }


}
