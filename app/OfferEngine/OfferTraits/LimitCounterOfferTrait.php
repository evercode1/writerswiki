<?php

namespace App\OfferEngine\OfferTraits;

trait LimitCounterOfferTrait
{


    public function capCounterOffer($counterOffer, $previousCounter)
    {


        return $counterOffer < $previousCounter ?  $counterOffer : $previousCounter - 1;



    }


}
