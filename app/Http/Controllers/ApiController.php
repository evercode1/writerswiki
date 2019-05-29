<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;

class ApiController extends Controller
{

    // Begin Nudge Api Data Grid Method

    public function nudgeData(Request $request)
    {

        return GridQuery::sendData($request, 'NudgeQuery');

    }

    // End Nudge Api Data Grid Method


    //
}
