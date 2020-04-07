<?php

namespace App\OfferEngine\OfferTraits;

use App\Offer;


trait CounterOfferFinalCheckTrait
{

    public function counterOfferFinalCheck($itemId, $userId, $siteId)
    {

        $row = Offer::where([['user_id', '=', $userId],
                              ['item_id', '=', $itemId],
                              ['site_id', '=', $siteId],
                              ['is_final_counter_offer', '=', 1]])
                       ->exists();



        return $row ? 1 : 0;


    }






}
