<?php

namespace App\OfferEngine\OfferTraits;

use App\OfferEngine\RandomizeCounterOfferDecrement;

trait SetPropertiesTrait
{

    public $allowedOffersCount;
    public $bottomPrice;
    public $buyerType;
    public $config;
    public $cost;
    public $counterOffer;
    public $highPrice;
    public $itemId;
    public $maximumPrice;
    public $offer;
    public $offerQuality;
    public $offerWithinOfferCountLimit;
    public $previousCounterOffer;
    public $previousOfferCount;
    public $purchaserPrice;
    public $optimumPrice;
    public $spenderPrice;
    public $randomDecrement;
    public $resellerPrice;
    public $scenario = [];
    public $sellingMode;
    public $siteId;
    public $userId;
    public $volumePrice;


    public function setProperties($array): void
    {

        foreach ($array as $propertyName => $propertyValue) {

            if (property_exists($this, $propertyName)) {

                if ( $propertyName != 'config'){

                    $this->$propertyName = $propertyValue;

                }

            }

        }
    }

    public function setAdditionalProperties()
    {

        $this->previousOfferCount = $this->countPreviousOffers($this->itemId, $this->userId, $this->siteId);

        $this->offerWithinOfferCountLimit = $this->allowableNumberOfOffers($this->previousOfferCount, $this->allowedOffersCount);

        $decrement = new RandomizeCounterOfferDecrement($this->makeConfig());

        $this->randomDecrement = $decrement->random();



    }

    public function makeConfig()
    {

        $config = get_object_vars($this);

        unset($config["config"]);

        unset($config["middleware"]);

        return $config;

    }



}
