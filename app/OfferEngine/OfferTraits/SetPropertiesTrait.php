<?php

namespace App\OfferEngine\OfferTraits;

use App\OfferEngine\RandomizeCounterOfferDecrement;

trait SetPropertiesTrait
{

    public $scenario = [];
    public $siteId;
    public $sellingAttitude;
    public $buyerType;
    public $userId;
    public $itemId;
    public $offer;
    public $cost;
    public $offerQuality;
    public $counterOffer;
    public $previousCounterOffer;
    public $highPrice;
    public $optimumPrice;
    public $resellerPrice;
    public $bottomPrice;
    public $volumePrice;
    public $purchaserPrice;
    public $maximumPrice;
    public $allowedOffersCount;
    public $currentSales;
    public $salesTarget;
    public $config;
    public $offerWithinOfferCountLimit;
    public $randomDecrement;
    public $previousOfferCount;

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
