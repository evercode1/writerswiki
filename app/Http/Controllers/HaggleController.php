<?php

namespace App\Http\Controllers;

use App\UtilityTraits\ScenarioTraits;
use Illuminate\Http\Request;

class HaggleController extends Controller
{

    use ScenarioTraits;

    public $scenario = [];

    public function index()
    {

        return view ('haggle.index');

    }

    public function counter(Request $request)
    {

        $this->scenario = $this->setScenario($request->scenario);

        // are sales slow for the item?

        // type of buyer

        //  quality of buyer

        // is the offer serious?




        $counterOffer = $request->offer + 10;

        return $counterOffer;

    }



}
