<?php

namespace App\OfferEngine;

class RandomizeCounterOfferDecrement
{

    public $itemId;
    public $offer;
    public $previousOffer;
    public $range = 5;
    public $siteId;
    public $userId;



    public function __construct($config)
    {

        $this->setProperties($config);
        $this->offer = (int)$this->offer;
        $this->previousOffer = PreviousOffer::setPreviousOffer($this->userId, $this->itemId, $this->siteId );


    }

    public function random()
    {

        if($this->offer < 20){

            return rand(1, $this->range);
        }

        if ($this->offer >= $this->previousOffer * 2){

            return round($this->offer * .80) + $this->range;
        }

        if ($this->offer >= $this->previousOffer * 1.75){

            return round($this->offer * .60) + $this->range;

        }

        if ($this->offer >= $this->previousOffer * 1.5){

            return round($this->offer * .50) + $this->range;

        }

        if ($this->offer >= $this->previousOffer * 1.35){

            return round($this->offer * .40) + $this->range;

        }


        $range = round($this->offer * .30) + $this->range;

        return rand(1, $range);

    }

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


}
