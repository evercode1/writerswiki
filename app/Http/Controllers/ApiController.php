<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Queries\AlarmQuery;
use App\Queries\AlarmAdminQuery;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    // Begin Subcategory Api Data Grid Method

    public function subcategoryData(Request $request)
    {

        return GridQuery::sendData($request, 'SubcategoryQuery');

    }

    // End Subcategory Api Data Grid Method



    



    



    



    



    



    




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


    public function userData(Request $request)
    {

           return GridQuery::sendData($request, 'UserQuery');

    }




}
