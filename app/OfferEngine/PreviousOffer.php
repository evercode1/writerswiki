<?php

namespace App\OfferEngine;

use App\Offer;

class PreviousOffer
{

    public static function setPreviousOffer($userId, $itemId, $siteId)
    {
        $row = Offer::where([['user_id', '=', $userId],
            ['item_id', '=', $itemId],
            ['site_id', '=', $siteId]])
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();

        $rowArray = $row->pluck('offer');

        if(isset($rowArray[0])){

            $previousOffer = $rowArray[0];


            return $previousOffer;


        }

        Return 0;

    }


}
