<?php

namespace App\OfferEngine\OfferTraits;

trait OfferStrategiesTrait
{

    public $range = 5;



    public function previousCounterOfferStrategy()
    {

        if ($this->sellingMode == 'volume'){

            return $this->strategy('volume');

        }

        $priceType = strtolower($this->buyerType);


            return $this->strategy($priceType);


    }

    public function defaultOfferStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->highPrice - $this->randomDecrement;

        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->floor('optimumPrice');

        $finalOffer = $counterOffer < $this->optimumPrice ? 1 : 0;

        return compact('counterOffer', 'finalOffer');

    }



    public function strategy($priceType)
    {

        $priceName = strtolower($priceType) . 'Price';

        $priceName = strtolower($priceType) === 'newbie' ? 'optimumPrice' : $priceName;

        $price = $this->$priceName;


        if ($this->offerAcceptable($this->offer, $price)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');


        }

        $counterOffer = $this->setCounterOffer();


        $counterOffer = $counterOffer > $price ?
            $counterOffer :  $this->floor($priceName);

        $finalOffer = $counterOffer < $price ? 1 : 0;

        return compact('counterOffer', 'finalOffer');



    }


    public function maximumStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->setCounterOffer();


        if ($counterOffer === $this->previousCounterOffer){

            $counterOffer = $counterOffer - rand(1, $this->range);

            $finalOffer = $counterOffer < $this->maximumPrice ? 1 : 0;

            return compact('counterOffer', 'finalOffer');

        }


        if ($this->previousCounterOffer < $this->maximumPrice){


           $counterOffer = $this->optimumPrice - rand(1, $this->range);

           $counterOffer = $counterOffer >= $this->previousCounterOffer ?

               $this->previousCounterOffer - rand(1, $this->range) : $counterOffer;

            $finalOffer = $counterOffer < $this->maximumPrice ? 1 : 0;

            return compact('counterOffer', 'finalOffer');

        }


        $counterOffer = $counterOffer >= $this->maximumPrice ?
            $counterOffer :  $this->floor('maximumPrice');

        $finalOffer = $counterOffer < $this->maximumPrice ? 1 : 0;

        return compact('counterOffer', 'finalOffer');


    }

    public function floor($priceType)
    {

        $counterOffer = $this->$priceType - rand(1, $this->range);

        return $counterOffer > $this->offer ? $counterOffer : $this->offer ;


    }



    /**
     * @return mixed
     */
    public function setCounterOffer()
    {
        $counterOffer = $this->previousCounterOffer - $this->randomDecrement;

        $counterOffer = $this->capCounterOffer($counterOffer, $this->previousCounterOffer);

        $counterOffer = $counterOffer < $this->offer ? $this->offer : $counterOffer;

        return $counterOffer;
    }





}
