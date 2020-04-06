<?php

namespace App\OfferEngine;

class SellingAttitude
{

    /**
     * actual function will have to call data from DB, will need item ID.
     * @return string
     */

    public static function setSellingAttitude($currentSales, $salesTarget ): string
    {

        $attitude = $currentSales >= $salesTarget ? 'Margin' : 'Volume';

        return $attitude;
    }



}
