<?php

namespace App\OfferEngine;

use App\OfferEngine\OfferTraits\ScenarioTraits;
use App\OfferEngine\OfferTraits\SetPropertiesTrait;
use Illuminate\Http\Request;

class OfferDetails
{

    use ScenarioTraits, SetPropertiesTrait;


    public $scenario = [];
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


        $this->scenario = $this->createScenario($request);

        $this->setProperties($this->scenario);

        $this->offer = $request->offer;

        $this->previousCounterOffer = $this->getPreviousCounterOffer();

        $this->sellingAttitude = $this->getSellingAttitude();

        $this->offerQuality = $this->getOfferQuality();

        $this->config = $this->makeConfig();

    }

    public function createScenario(Request $request)
    {


        return $this->mockScenario($request);


    }



    public function getOfferQuality()
    {

        return OfferQuality::setOfferQuality($this->offer, $this->cost, $this->bottomPrice, $this->optimumPrice);

    }

    public function getPreviousCounterOffer()
    {

        return PreviousCounterOffers::setPreviousCounterOffer($this->userId, $this->itemId, $this->siteId);

    }


    public function getSellingAttitude()
    {

        return SellingAttitude::setSellingAttitude($this->currentSales, $this->salesTarget);

    }


    public function makeConfig()
    {

        $config = get_object_vars($this);

        unset($config["config"]);

        unset($config["middleware"]);

        return $config;

    }


}
