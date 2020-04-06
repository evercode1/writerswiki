<?php

namespace App\OfferEngine\Negotiators;

use App\OfferEngine\Negotiators\Contracts\CounterOffer;
use App\OfferEngine\OfferTraits\CountPreviousOffersTrait;
use App\OfferEngine\OfferTraits\LimitCounterOfferTrait;
use App\OfferEngine\OfferTraits\OfferAcceptableTrait;
use App\OfferEngine\OfferTraits\OfferStrategiesTrait;
use App\OfferEngine\RandomizeCounterOfferDecrement;
use App\OfferEngine\OfferTraits\SetPropertiesTrait;

class SolidOfferCounterOffer implements CounterOffer
{

    use SetPropertiesTrait,
        OfferAcceptableTrait,
        CountPreviousOffersTrait,
        OfferStrategiesTrait,
        LimitCounterOfferTrait;


    public function __construct($config)
    {

        $this->setProperties($config);

        $this->setAdditionalProperties();

    }

    public function counterOffer()
    {

        if ($this->previousCounterOffer){

            if( ! $this->offerWithinOfferCountLimit ){

                return $this->maximumStrategyAdvanced();

            }

            return $this->previousCounterOfferStrategyAdvanced();

        }

        return $this->defaultOfferStrategy();

    }



}
