<?php

namespace App\OfferEngine;

use App\OfferEngine\OfferTraits\SetPropertiesTrait;


class CounterOffer
{
    use SetPropertiesTrait;

    public $config;


    public function __construct($config)
    {

        $this->config = $config;
        $this->setProperties($this->config);


    }

    public function runCounterOffer()
    {


        $offerQuality = $this->config['offerQuality'];

        $negotiator = $this->invokeClassWithNameFrom($offerQuality);

        return  $negotiator->counterOffer();


    }


    /**
     * @param $offerQuality
     * @return mixed
     */
    public function invokeClassWithNameFrom($offerQuality)
    {
        $className = FormatClassString::formatClassName($offerQuality);

        $negotiator = new $className($this->config);

        return $negotiator;

    }


}
