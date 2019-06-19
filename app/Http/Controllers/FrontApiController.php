<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;

class FrontApiController extends Controller
{

    // Begin MediaLink Api All Models Method

    public function allMediaLinksData(Request $request)
    {

        return GridQuery::sendData($request, 'MediaLinkQuery');

    }

    // End MediaLink Api All Models Method



    // Begin Book Api All Models Method

    public function allBooksData(Request $request)
    {

        return GridQuery::sendData($request, 'AllBooksQuery');

    }

    // End Book Api All Models Method


    //
}
