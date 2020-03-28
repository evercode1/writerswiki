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
                'userId' => 123,
                'userName' => 'Grimby',
                'itemId' => 2143,
                'itemDescription' => 'CZ RING',
                'salesTarget' => 5,
                'currentSales' => 6,
                'previousOfferSessionForSameItem' => false,
                'previousOfferSessionForSameItemAmount' => 0,
                'previousCounterOfferSessionForSameItemAmount' => 0,
                'bottomPrice' => 37,
                'cost' => 25,
                'highPrice' => 101,
                'optimumPrice' => 50,
                'resellerPrice' => 42,
                'customerSalesHistoryCount' => 0,
                'customerSalesHistoryValue' => 0,
                'description' => 'Our newbie is less than 30 days old.  They are offering on a low cost item to try the system.'];


    }

    public function purchaser()
    {
        return   ['scenario' => 'Purchaser',
                  'userId' => 111,
                  'userName' => 'Varen',
                  'itemId' => 3178,
                  'itemDescription' => 'LG Earrings',
                  'salesTarget' => 2,
                  'currentSales' => 1,
                  'previousOfferSessionForSameItem' => true,
                  'previousOfferSessionForSameItemAmount' => 240,
                  'previousCounterOfferSessionForSameItemAmount' => 870,
                  'bottomPrice' => 390,
                  'cost' => 350,
                  'highPrice' => 975,
                  'optimumPrice' => 700,
                  'resellerPrice' => 420,
                  'customerSalesHistoryCount' => 4,
                  'customerSalesHistoryValue' => 150,
                  'description' => 'Our purchaser has purchased from us before.  They are offering on a mid cost item to add to their collection.'];




    }

    public function reseller()
    {
        return ['scenario' => 'Reseller',
                'userId' => 143,
                'userName' => 'Celeste',
                'itemId' => 5498,
                'itemDescription' => 'LG 1 Carat Solitaire',
                'salesTarget' => 3,
                'currentSales' => 2,
                'previousOfferSessionForSameItem' => false,
                'previousOfferSessionForSameItemAmount' => 0,
                'previousCounterOfferSessionForSameItemAmount' => 0,
                'bottomPrice' => 1500,
                'cost' => 1000,
                'highPrice' => 2800,
                'optimumPrice' => 2000,
                'resellerPrice' => 1800,
                'customerSalesHistoryCount' => 11,
                'customerSalesHistoryValue' => 3100,
                'description' => 'Our reseller buys a lot.  They are offering on a high cost item to add to resell.'];


    }


}
