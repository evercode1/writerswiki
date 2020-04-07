<?php

namespace App\OfferEngine\OfferTraits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait ScenarioTraits
{



    public function mockScenario(Request $request)
    {
        $scenario = $request->scenario;

        switch($scenario){

            case 'Newbie':

                $scenario = $this->newbie();


                return $scenario;

            case 'Purchaser':

                $scenario = $this->purchaser();


                return $scenario;

            case 'Spender':

                $scenario = $this->spender();


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
                'siteId' => 1,
                'buyerType' => 'Newbie',
                'userId' => 123,
                'userName' => 'Grimby',
                'itemId' => 2143,
                'itemDescription' => 'AMETHYST RING',
                'salesTarget' => 5,
                'currentSales' => 6,
                'bottomPrice' => 37,
                'purchaserPrice' => 45,
                'spenderPrice' => 43,
                'volumePrice' => 41,
                'cost' => 25,
                'highPrice' => 101,
                'maximumPrice' => 60,
                'optimumPrice' => 49,
                'resellerPrice' => 43,
                'allowedOffersCount' => 10,
                'customerSalesHistoryCount' => 0,
                'customerSalesHistoryValue' => 0,
                'description' => 'Our newbie is less than 30 days old.  They are offering on a low cost item to try the system.'];


    }

    public function purchaser()
    {
        return   ['scenario' => 'Purchaser',
                  'siteId' => 1,
                  'buyerType' => 'Purchaser',
                  'userId' => 111,
                  'userName' => 'Varen',
                  'itemId' => 3178,
                  'itemDescription' => 'LG Earrings',
                  'salesTarget' => 2,
                  'currentSales' => 3,
                  'bottomPrice' => 390,
                  'cost' => 350,
                  'highPrice' => 975,
                  'optimumPrice' => 701,
                  'maximumPrice' => 757,
                  'resellerPrice' => 423,
                  'purchaserPrice' => 554,
                  'spenderPrice' => 475,
                  'volumePrice' => 405,
                  'allowedOffersCount' => 10,
                  'customerSalesHistoryCount' => 4,
                  'customerSalesHistoryValue' => 150,
                  'description' => 'Our purchaser has purchased from us before.  They are offering on a mid cost item to add to their collection.'];




    }

    public function spender()
    {
        return   ['scenario' => 'Spender',
                  'siteId' => 1,
                  'buyerType' => 'Spender',
                  'userId' => 133,
                  'userName' => 'Whale',
                  'itemId' => 4471,
                  'itemDescription' => 'LG .50 Carat Solitaire Ring',
                  'salesTarget' => 2,
                  'currentSales' => 3,
                  'bottomPrice' => 487,
                  'cost' => 430,
                  'highPrice' => 1229,
                  'optimumPrice' => 861,
                  'maximumPrice' => 943,
                  'resellerPrice' => 588,
                  'purchaserPrice' => 761,
                  'spenderPrice' => 661,
                  'volumePrice' => 521,
                  'allowedOffersCount' => 10,
                  'customerSalesHistoryCount' => 8,
                  'customerSalesHistoryValue' => 1600,
                  'description' => 'Our Spender likes to buy on our site.  They are offering on a mid cost item to add to their collection.'];




    }


    public function reseller()
    {
        return ['scenario' => 'Reseller',
                'siteId' => 2,
                'buyerType' => 'Reseller',
                'userId' => 143,
                'userName' => 'Celeste',
                'itemId' => 5498,
                'itemDescription' => 'LG 1 Carat Solitaire',
                'salesTarget' => 3,
                'currentSales' => 2,
                'bottomPrice' => 1502,
                'cost' => 1000,
                'highPrice' => 2803,
                'optimumPrice' => 1971,
                'maximumPrice' => 2325,
                'resellerPrice' => 1769,
                'volumePrice' => 1483,
                'purchaserPrice' => 1927,
                'spenderPrice' => 1821,
                'allowedOffersCount' => 10,
                'customerSalesHistoryCount' => 11,
                'customerSalesHistoryValue' => 3100,
                'description' => 'Our reseller buys a lot.  They are offering on a high cost item to add to resell.'];


    }

    public function truncateOffers()
    {
        DB::table('offers')->truncate();

    }


}
