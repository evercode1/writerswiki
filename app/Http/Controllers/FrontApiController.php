<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\MediaLinkType;

class FrontApiController extends Controller
{

    // Begin Description Api All Models Method

    public function allDescriptionsData(Request $request)
    {

        return GridQuery::sendData($request, 'AllDescriptionsQuery');

    }

    // End Description Api All Models Method


    public function descriptionDetailData(Request $request, $type)
    {

        return GridQuery::sendData($request, 'DescriptionDetailQuery', $type);

    }



    public function actionBeatDetailsData(Request $request, $type)
    {

        return GridQuery::sendData($request, 'ActionBeatDetailsQuery', $type);

    }

    // Begin ActionBeat Api All Models Method

    public function allActionBeatsData(Request $request)
    {

        return GridQuery::sendData($request, 'AllActionBeatsQuery');

    }

    // End ActionBeat Api All Models Method



    // Begin Emotion Api All Models Method

    public function allEmotionsData(Request $request)
    {

        return GridQuery::sendData($request, 'AllEmotionsQuery');

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



    public function emotionExpressionData(Request $request, $type)
    {

        return GridQuery::sendData($request, 'EmotionExpressionQuery', $type);


    }


    public function selfPublishingData(Request $request)
    {


        return GridQuery::sendData($request, 'SelfPublishingQuery');


    }
}
