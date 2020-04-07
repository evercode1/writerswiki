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
            $counterOffer :  $this->floor('optimumPrice');

        $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');

    }

    public function previousDefaultStrategy()
    {

        $counterOffer = $this->setCounterOffer();


        if ($this->buyerType == 'Reseller'){

            $counterOffer = $counterOffer > $this->resellerPrice ?
                $counterOffer :  $this->floor('resellerPrice');

            $finalOffer = $counterOffer < $this->resellerPrice ?
                $finalOffer = 1 :  $finalOffer = 0;

            return compact('counterOffer', 'finalOffer');

        }

        if ($this->buyerType == 'Purchaser'){

            $counterOffer = $counterOffer > $this->purchaserPrice ?
                $counterOffer :  $this->floor('purchaserPrice');

            $finalOffer = $counterOffer < $this->purchaserPrice ?
                $finalOffer = 1 :  $finalOffer = 0;

            return compact('counterOffer', 'finalOffer');

        }

        $counterOffer = $counterOffer > $this->optimumPrice ?
            $counterOffer :  $this->floor('optimumPrice');

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

        if ($this->buyerType == 'Spender'){


            return $this->spenderStrategy();

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
            $counterOffer :  $this->floor('optimumPrice');

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
            $counterOffer :  $this->floor('resellerPrice');

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
            $counterOffer :  $this->floor('volumePrice');

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
            $counterOffer :  $this->floor('purchaserPrice');

        $finalOffer = $counterOffer < $this->purchaserPrice ?
            $finalOffer = 1 :  $finalOffer = 0;

        return compact('counterOffer', 'finalOffer');
    }

    public function spenderStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->spenderPrice)){

            $counterOffer = $this->offer;

            $finalOffer = 1;

            return compact('counterOffer', 'finalOffer');

        }


        $counterOffer = $this->setCounterOffer();

        $counterOffer = $counterOffer > $this->spenderPrice ?
            $counterOffer :  $this->floor('spenderPrice');

        $finalOffer = $counterOffer < $this->spenderPrice ?
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
            $counterOffer :  $this->floor('optimumPrice');

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
