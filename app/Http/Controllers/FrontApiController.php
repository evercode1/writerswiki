<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontApiController extends Controller
{

    // Begin Book Api All Models Method

    public function allBooksData(Request $request)
    {

        return GridQuery::sendData($request, 'BookQuery');

    }

    // End Book Api All Models Method


    //
}
