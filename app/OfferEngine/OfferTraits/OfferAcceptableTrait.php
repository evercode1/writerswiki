<?php

namespace App\OfferEngine\OfferTraits;

trait OfferAcceptableTrait
{

    public function offerAcceptable($offer, $targetPrice)
    {

        if ( $offer >= $targetPrice){

            return $offer;

        }


    }

    public function allowableNumberOfOffers($previousOfferCount, $allowedOffersCount)
    {


        return $previousOfferCount < $allowedOffersCount ? true : false;


    }



}
