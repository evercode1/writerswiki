<?php

namespace App\OfferEngine;

use App\OfferEngine\OfferTraits\CountPreviousOffersTrait;
use App\OfferEngine\OfferTraits\LimitCounterOfferTrait;
use App\OfferEngine\OfferTraits\OfferAcceptableTrait;
use App\OfferEngine\OfferTraits\OfferStrategiesTrait;
use App\OfferEngine\OfferTraits\SetPropertiesTrait;


class CounterOffer
{
    use SetPropertiesTrait,
        OfferAcceptableTrait,
        CountPreviousOffersTrait,
        OfferStrategiesTrait,
        LimitCounterOfferTrait;

    public $config;


    public function __construct($config)
    {

        $this->config = $config;
        $this->setProperties($this->config);
        $this->setAdditionalProperties();


    }

    public function runCounterOffer()
    {


        if($this->previousCounterOffer){

            if( ! $this->offerWithinOfferCountLimit ){

                return $this->maximumStrategy();

            }

            return $this->previousCounterOfferStrategy();

        }

        return $this->defaultOfferStrategy();


    }



}
