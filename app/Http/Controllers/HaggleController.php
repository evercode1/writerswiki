<?php

namespace App\Http\Controllers;

use App\UtilityTraits\ScenarioTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Offer;
use Illuminate\Support\Facades\DB;

class HaggleController extends Controller
{

    use ScenarioTraits;

    public $scenario = [];
    public $sellingAttitude;
    public $buyerType;
    public $userId;
    public $itemId;
    public $offer;
    public $offerQuality;
    public $counterOffer;
    public $previousCounterOffer;
    public $highPrice;
    public $optimumPrice;
    public $resellerPrice;
    public $bottomPrice;



    public function index()
    {

        $this->truncateOffers();

        return view ('haggle.index');

    }

    public function counter(Request $request)
    {

        $this->setDefaults($request);


        $this->counterOffer = $this->makeCounterOffer();

        $this->saveOffer();

        return $this->counterOffer;

    }


    public function makeCounterOffer()
    {

        $offerQuality = $this->offerQuality;

        switch($offerQuality){

            case 'bottom feed' :

                return  $this->bottomFeedCounterOffer();
                break;

            case 'low ball' :

                return  $this->lowBallCounterOffer();
                break;

            case 'below cost' :

                return  $this->belowCostCounterOffer();
                break;

            case 'at cost' :

                return  $this->atCostCounterOffer();
                break;

            case 'minimal offer' :

                return  $this->minimalOfferCounterOffer();
                break;

            case 'weak offer' :

                return  $this->weakOfferCounterOffer();
                break;

            case 'solid offer' :

                return  $this->solidOfferCounterOffer();
                break;

            case 'strong offer' :

                return  $this->strongOfferCounterOffer();
                break;

            Default:

                return $this->optimumPrice;


        }


    }


    public function bottomFeedCounterOffer()
    {

        $range = $this->offer + 4;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function lowBallCounterOffer()
    {


        $range = $this->offer + 8;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function belowCostCounterOffer()
    {

        $range = $this->offer + 2;

        $randomDecrement = $this->randomizeCounterOfferDecrease(1, $range);


        if($this->previousCounterOffer){

            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function atCostCounterOffer()
    {

        $range = $this->offer + 4;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){

            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function minimalOfferCounterOffer()
    {

        $range = $this->offer + 5;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){

            if ($this->buyerType == 'Reseller'){

                $randomDecrement = round($this->previousCounterOffer * .10);


                $counterOffer = $this->previousCounterOffer - $randomDecrement;


                return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;


            }


            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function weakOfferCounterOffer()
    {

        $range = $this->offer + 5;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){

            if ($this->buyerType == 'Reseller'){

                $randomDecrement = round($this->previousCounterOffer * .10);


                $counterOffer = $this->previousCounterOffer - $randomDecrement;


                return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;


            }

            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function solidOfferCounterOffer()
    {

        $range = $this->offer + 5;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){

            if ($this->buyerType == 'Reseller'){

                $randomDecrement = round($this->previousCounterOffer * .10);


                $counterOffer = $this->previousCounterOffer - $randomDecrement;


                return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;


            }

            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function strongOfferCounterOffer()
    {

        $range = $this->offer + 5;

        $randomDecrement = $this->randomizeCounterOfferDecrease($this->offer, $range);


        if($this->previousCounterOffer){

            if ($this->buyerType == 'Reseller'){

                $randomDecrement = round($this->previousCounterOffer * .10);


                $counterOffer = $this->previousCounterOffer - $randomDecrement;


                return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;


            }

            $randomDecrement = round($this->previousCounterOffer * .10);


            $counterOffer = $this->previousCounterOffer - $randomDecrement;


            return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

        }

        $counterOffer = $this->highPrice - $randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }



    public function randomizeCounterOfferDecrease($startingValue, $range)
    {

            return rand($startingValue, $range);

    }

    /**
     * @param Request $request
     */

    public function setDefaults(Request $request): void
    {
        $this->scenario = $this->setScenario($request->scenario);

        $this->itemId = Arr::get($this->scenario, 'itemId');

        $this->userId = Arr::get($this->scenario, 'userId');

        $this->optimumPrice = Arr::get($this->scenario, 'optimumPrice');

        $this->highPrice = Arr::get($this->scenario, 'highPrice');

        $this->resellerPrice = Arr::get($this->scenario, 'resellerPrice');

        $this->bottomPrice = Arr::get($this->scenario, 'bottomPrice');

        $this->previousCounterOffer = $this->setPreviousCounterOffer();

        $this->offer = $request->offer;

        $this->sellingAttitude = $this->setSellingAttitude();

        $this->buyerType = $this->setBuyerType();

        $this->offerQuality = $this->setOfferQuality();
    }

    public function setPreviousCounterOffer()
    {

           $row = Offer::where([['user_id', '=', $this->userId],['item_id', '=', $this->itemId]])
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();

           $rowArray = $row->pluck('counter_offer');

           if(isset($rowArray[0])){

               $previousCounterOffer = $rowArray[0];


                   return $previousCounterOffer;


           }




        Return 0;


    }

    public function truncateOffers()
    {

        DB::table('offers')->truncate();


    }


    /**
     * @return string
     */
    public function setSellingAttitude(): string
    {
        $salesTarget = Arr::get($this->scenario, 'salesTarget');

        $currentSales = Arr::get($this->scenario, 'currentSales');

        $attitude = $currentSales >= $salesTarget ? 'Volume' : 'Margin';

        return $attitude;
    }

    /**
     * @return string
     */
    public function setBuyerType(): string
    {
        $buyerType = Arr::get($this->scenario, 'scenario');

        return $buyerType;

    }




    Public function setOfferQuality()
    {

        $offer = $this->offer;

        $cost = Arr::get($this->scenario, 'cost');

        $bottomPrice = Arr::get($this->scenario, 'bottomPrice');

        $optimumPrice = Arr::get($this->scenario, 'optimumPrice');

        if ( $offer <= ($cost * .10) ){

            return 'bottom feed';

        }

        if ( $offer <= ($cost * .50) ){

            return 'low ball';

        }

        if ( $offer <= $cost ){

            return 'below cost';

        }

        if ( $offer == $cost ){

            return 'at cost';

        }

        if ( $offer <= ( $cost * 1.10 ) ){

            return 'minimal offer';

        }

        if ( $offer <= ( $bottomPrice * 1.10 ) ){

            return 'weak offer';

        }

        if ( $offer > $bottomPrice && $offer < $optimumPrice ){


            return 'solid offer';

        }

        if ( $offer >= $optimumPrice ){


            return 'strong offer';
        }


    }

    public function saveOffer(): void
    {
        $offer = Offer::create(['user_id'       => $this->userId,
                                'item_id'       => $this->itemId,
                                'offer'         => $this->offer,
                                'counter_offer' => $this->counterOffer,
                                'offer_quality' => $this->offerQuality]);

        $offer->save();
    }


}
