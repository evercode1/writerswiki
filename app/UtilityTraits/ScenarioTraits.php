<?php

namespace App\UtilityTraits;

use Illuminate\Http\Request;

trait ScenarioTraits
{


    public function setScenario($scenario)
    {

        $scenario = strtolower($scenario);

        $scenario = $this->$scenario();

        return $scenario;

    }

    public function scenario(Request $request)
    {
        $scenario = $request->scenario;

        switch($scenario){

            case 'Newbie':

                $scenario = $this->newbie();


                return $scenario;

            case 'Purchaser':

                $scenario = $this->purchaser();


                return $scenario;

            case 'Reseller':

                $scenario = $this->reseller();

                return $scenario;

            default:

                $scenario = $this->newbie();


                return $scenario;



        }


    }

    public function newbie()
    {
        return ['scenario' => 'Newbie',
                'bottomPrice' => 37,
                'cost' => 25,
                'highPrice' => 101,
                'optimumPrice' => 50,
                'resellerPrice' => 42,
                'description' => 'Our newbie is less than 30 days old.  They are offering on a low cost item to try the system.'];


    }

    public function purchaser()
    {
        return   ['scenario' => 'Purchaser',
                  'bottomPrice' => 390,
                  'cost' => 350,
                  'highPrice' => 975,
                  'optimumPrice' => 700,
                  'resellerPrice' => 420,
                  'description' => 'Our purchaser had been around a while.  They are offering on a mid cost item to add to their collection.'];




    }

    public function reseller()
    {
        return ['scenario' => 'Reseller',
                'bottomPrice' => 1500,
                'cost' => 1000,
                'highPrice' => 2800,
                'optimumPrice' => 2000,
                'resellerPrice' => 1800,
                'description' => 'Our reseller buys a lot.  They are offering on a high cost item to add to resell.'];


    }


}
