<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Queries\AlarmQuery;
use App\Queries\AlarmAdminQuery;
use Illuminate\Support\Facades\Auth;
use App\Queries\SignatureQuery;
use App\Queries\SubcategoriesForDropdownQuery;
use App\Queries\CategoriesForDropdownQuery;

class ApiController extends Controller
{

    // Begin Channel Api Data Grid Method

    public function channelData(Request $request)
    {

        return GridQuery::sendData($request, 'ChannelQuery');

    }

    // End Channel Api Data Grid Method



    // Begin Detail Api Data Grid Method

    public function detailData(Request $request)
    {

        return GridQuery::sendData($request, 'DetailQuery');

    }

    // End Detail Api Data Grid Method



    // Begin Description Api Data Grid Method

    public function descriptionData(Request $request)
    {

        return GridQuery::sendData($request, 'DescriptionQuery');

    }

    // End Description Api Data Grid Method



    // Begin ActionBeatDescription Api Data Grid Method

    public function actionBeatDescriptionData(Request $request)
    {

        return GridQuery::sendData($request, 'ActionBeatDescriptionQuery');

    }

    // End ActionBeatDescription Api Data Grid Method



    // Begin ActionBeat Api Data Grid Method

    public function actionBeatData(Request $request)
    {

        return GridQuery::sendData($request, 'ActionBeatQuery');

    }

    // End ActionBeat Api Data Grid Method



    // Begin Expression Api Data Grid Method

    public function expressionData(Request $request)
    {

        return GridQuery::sendData($request, 'ExpressionQuery');

    }

    // End Expression Api Data Grid Method



    // Begin Emotion Api Data Grid Method

    public function emotionData(Request $request)
    {

        return GridQuery::sendData($request, 'EmotionQuery');

    }

    // End Emotion Api Data Grid Method



    // Begin MediaLink Api Data Grid Method

    public function mediaLinkData(Request $request)
    {

        return GridQuery::sendData($request, 'MediaLinkQuery');

    }

    // End MediaLink Api Data Grid Method



    // Begin MediaLinkType Api Data Grid Method

    public function mediaLinkTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'MediaLinkTypeQuery');

    }

    // End MediaLinkType Api Data Grid Method

    public function mediaLinkTypes(Request $request)
    {


        return GridQuery::sendData($request, 'MediaLinkTypesQuery');


    }





    // Begin Book Api Data Grid Method

    public function bookData(Request $request)
    {

        return GridQuery::sendData($request, 'BookQuery');

    }

    // End Book Api Data Grid Method



    // Begin ContributorLink Api Data Grid Method

    public function contributorLinkData(Request $request)
    {

        return GridQuery::sendData($request, 'ContributorLinkQuery');

    }

    // End ContributorLink Api Data Grid Method



    // Begin ContributorLinkType Api Data Grid Method

    public function contributorLinkTypeData(Request $request)
    {

        return GridQuery::sendData($request, 'ContributorLinkTypeQuery');

    }

    // End ContributorLinkType Api Data Grid Method



   public function pendingContributorData(Request $request)
   {

       return GridQuery::sendData($request, 'PendingContributorQuery');


   }



    // Begin Profile Api Data Grid Method

    public function profileData(Request $request)
    {

        return GridQuery::sendData($request, 'ProfileQuery');

    }

    // End Profile Api Data Grid Method



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

    public function categoriesForDropdown()
    {

        return CategoriesForDropdownQuery::data();

    }

    // Begin Category Api Data Grid Method

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, 'CategoryQuery');

    }

    // End Category Api Data Grid Method

    public function closedContactData(Request $request)
    {

        return GridQuery::sendData($request, 'ClosedContactQuery');

    }

    public function contactData(Request $request)
    {

        return GridQuery::sendData($request, 'ContactQuery');

    }

    // Begin ContactTopic Api Data Grid Method

    public function contactTopicData(Request $request)
    {

        return GridQuery::sendData($request, 'ContactTopicQuery');

    }

    // End ContactTopic Api Data Grid Method



    // Begin Content Api Data Grid Method

    public function contentData(Request $request)
    {

        return GridQuery::sendData($request, 'ContentQuery');

    }

    // End Content Api Data Grid Method

    public function openContactData(Request $request)
    {

        return GridQuery::sendData($request, 'OpenContactQuery');

    }

    public function signature(Request $request, $id)
    {

        return SignatureQuery::data($id);


    }

    // Begin Subcategory Api Data Grid Method

    public function subcategoryData(Request $request)
    {

        return GridQuery::sendData($request, 'SubcategoryQuery');

    }

    // End Subcategory Api Data Grid Method

    public function subcategoriesForDropdown($id)
    {

        return SubcategoriesForDropdownQuery::data($id);

    }


    public function userData(Request $request)
    {

           return GridQuery::sendData($request, 'UserQuery');

    }




}
