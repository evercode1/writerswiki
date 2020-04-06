<?php

namespace App\OfferEngine\OfferTraits;

use App\Offer;


trait CounterOfferFinalCheckTrait
{

    public function counterOfferFinalCheck($itemId, $userId, $siteId)
    {

        $rows = Offer::where([['user_id', '=', $userId],
                              ['item_id', '=', $itemId],
                              ['site_id', '=', $siteId]])
                       ->orderBy('id', 'desc')
                       ->limit(2)
                       ->get();

        $rowsArray = $rows->pluck('counter_offer')->toArray();


        return count(array_unique($rowsArray)) == 1 && count($rowsArray) == 2 ? true : false;


    }






}
