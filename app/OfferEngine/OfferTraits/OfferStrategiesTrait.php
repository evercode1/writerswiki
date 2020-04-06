<?php

namespace App\OfferEngine\OfferTraits;

trait OfferStrategiesTrait
{

    public function defaultOfferStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            return $this->offer;

        }

        $counterOffer = $this->highPrice - $this->randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function previousDefaultStrategy()
    {

        $counterOffer = $this->setCounterOffer();


        if ($this->buyerType == 'Reseller'){

            return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;

        }

        if ($this->buyerType == 'Purchaser'){

            return $counterOffer > $this->purchaserPrice ?  $counterOffer :  $this->purchaserPrice;

        }

        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

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

            return $this->offer;

        }

        $counterOffer = $this->highPrice - $this->randomDecrement;


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }


    public function resellerStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->resellerPrice)){

            return $this->offer;

        }

        $counterOffer = $this->setCounterOffer();


        return $counterOffer > $this->resellerPrice ?  $counterOffer :  $this->resellerPrice;

    }


    public function volumeStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->volumePrice)){

            return $this->offer;

        }

        $counterOffer = $this->setCounterOffer();


        return $counterOffer > $this->volumePrice ?  $counterOffer :  $this->volumePrice;

    }

    public function purchaserStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->purchaserPrice)){

            return $this->offer;

        }


        $counterOffer = $this->setCounterOffer();


        return $counterOffer > $this->purchaserPrice ?  $counterOffer :  $this->purchaserPrice;

    }



    public function newbieOfferStrategy()
    {

        if ($this->offerAcceptable($this->offer, $this->optimumPrice)){

            return $this->offer;


        }

        $counterOffer = $this->setCounterOffer();


        return $counterOffer > $this->optimumPrice ?  $counterOffer :  $this->optimumPrice;

    }

    public function maximumStrategyAdvanced()
    {

        if($this->offer > $this->optimumPrice){

            return $this->offer;
        }

        $counterOffer = $this->setCounterOffer();


        if ($counterOffer >= $this->optimumPrice){

            return $counterOffer;

        }

        if ($this->previousCounterOffer < $this->maximumPrice){

            return $this->optimumPrice;

        }


        return $counterOffer >= $this->maximumPrice ?  $counterOffer :  $this->maximumPrice;


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
