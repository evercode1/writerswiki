<?php

namespace App\OfferEngine;

use App\Offer;

class PreviousCounterOffers
{

    public static function setPreviousCounterOffer($userId, $itemId, $siteId)
    {
        $row = Offer::where([['user_id', '=', $userId],
                             ['item_id', '=', $itemId],
                             ['site_id', '=', $siteId]])
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        $rowArray = $row->pluck('counter_offer')->toArray();

        if(isset($rowArray[0])){

            $previousCounterOffer = $rowArray[0];


            return $previousCounterOffer;


        }

        Return 0;

    }





}
