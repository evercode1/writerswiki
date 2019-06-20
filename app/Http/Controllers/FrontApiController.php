<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\MediaLinkType;

class FrontApiController extends Controller
{

    // Begin Emotion Api All Models Method

    public function allEmotionsData(Request $request)
    {

        return GridQuery::sendData($request, 'EmotionQuery');

    }

    // End Emotion Api All Models Method



    // Begin MediaLink Api All Models Method

    public function allMediaLinksData(Request $request)
    {

        $type = MediaLinkType::where('name', $request->type)->first();

       $type = $type->id;



        return GridQuery::sendData($request, 'AllMediaLinksQuery', $type);

    }

    // End MediaLink Api All Models Method



    // Begin Book Api All Models Method

    public function allBooksData(Request $request)
    {

        return GridQuery::sendData($request, 'AllBooksQuery');

    }

    // End Book Api All Models Method


    public function selfPublishingData(Request $request)
    {


        return GridQuery::sendData($request, 'SelfPublishingQuery');


    }
}
