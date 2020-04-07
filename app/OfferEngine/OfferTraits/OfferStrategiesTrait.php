<?php

namespace App\OfferEngine\OfferTraits;

trait OfferStrategiesTrait
{

    public $range = 5;

    public function defaultOfferStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->highPrice - $this->randomDecrement;

        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->optimumPrice - rand(1, $this->range);

        $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }

    public function previousDefaultStrategy()
    {

        $counterOffer = $this->setCounterOffer();


        if ($this->buyerType == 'Reseller'){

            $counterOffer = $counterOffer > $this->resellerPrice ?
                $counterOffer :  $this->resellerPrice - rand(1, $this->range);

            $finalOffer = $counterOffer < $this->resellerPrice ?
                $finalOffer = 1 :  $finalOffer = 0;

            return compact('counterOffer', 'finalOffer');

        }

        if ($this->buyerType == 'Purchaser'){

            $counterOffer = $counterOffer > $this->purchaserPrice ?
                $counterOffer :  $this->purchaserPrice - rand(1, $this->range);

            $finalOffer = $counterOffer < $this->purchaserPrice ?
                $finalOffer = 1 :  $finalOffer = 0;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->optimumPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->optimumPrice ?
            $finalOffer = 1 :  $finalOffer = 0;


        return compact('counterOffer', 'finalOffer');

    }

    public function previousCounterOfferStrategyAdvanced()
    {

        if ($this->sellingAttitude == 'Volume'){

            return$this->volumeStrategy();

        }

        if ($this->buyerType == 'Reseller'){

            return  $this->resellerStrategy();

        }

        if ($this->buyerType == 'Purchaser'){

            return  $this->purchaserStrategy();

        }

        return $this->newbieOfferStrategy();

    }

    public function optimumDefaultStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->highPrice - $this->randomDecrement;

        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->optimumPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->optimumPrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }


    public function resellerStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->resellerPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->setCounterOffer();


        $counterOffer = $counterOffer > $this->resellerPrice ?
            $counterOffer :  $this->resellerPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->resellerPrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }


    public function volumeStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->volumePrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $this->setCounterOffer();



        $counterOffer = $counterOffer > $this->volumePrice ?
            $counterOffer :  $this->volumePrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->volumePrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }

    public function purchaserStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->purchaserPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }


        $counterOffer = $this->setCounterOffer();

        $counterOffer = $counterOffer > $this->purchaserPrice ?
            $counterOffer :  $this->purchaserPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->purchaserPrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');
    }



    public function newbieOfferStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');


        }

        $counterOffer = $this->setCounterOffer();


        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->optimumPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->optimumPrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }

    public function maximumStrategyAdvanced()
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
            $counterOffer :  $this->maximumPrice - rand(1, $this->range);

        $finalOffer = $counterOffer < $this->maximumPrice ? 1 : 0;

        return compact('counterOffer', 'finalOffer');


    }

    /**
     * @return mixed
     */
    public function setCounterOffer()
    {
        $counterOffer = $this->previousCounterOffer - $this->randomDecrement;

        $counterOffer = $this->capCounterOffer($counterOffer, $this->previousCounterOffer);

        return $counterOffer;
    }





}
