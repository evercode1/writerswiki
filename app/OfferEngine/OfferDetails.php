<?php

namespace App\OfferEngine;

use App\OfferEngine\OfferTraits\SetPropertiesTrait;
use Illuminate\Http\Request;

class OfferDetails
{

    use SetPropertiesTrait;

    public $config;


    public function __construct(Request $request)
    {

        $this->setConfig($request);

        return $this->config;

    }

    /**
     * @param Request $request
     */

    public function setConfig(Request $request): void
    {

        $this->setProperties($request);

        $this->previousCounterOffer = $this->getPreviousCounterOffer();

        $this->offerQuality = $this->getOfferQuality();

        $this->config = $this->makeConfig();


    }


    public function getOfferQuality()
    {

        return OfferQuality::setOfferQuality($this->offer, $this->cost, $this->bottomPrice, $this->optimumPrice);

    }

    public function getPreviousCounterOffer()
    {

        return PreviousCounterOffers::setPreviousCounterOffer($this->userId, $this->itemId, $this->siteId);

    }

    public function setProperties($request): void
    {

        foreach($request->all() as $propertyName => $propertyValue) {

            if (property_exists($this, $propertyName)) {

                if ($propertyName != 'config') {

                    $this->$propertyName = $propertyValue;

                }

            }

        }

    }


    public function makeConfig()
    {

        $config = get_object_vars($this);

        unset($config["config"]);

        unset($config["middleware"]);

        return $config;

    }


}
