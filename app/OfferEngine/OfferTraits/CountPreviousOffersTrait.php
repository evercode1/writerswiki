<?php

namespace App\OfferEngine\OfferTraits;

use Illuminate\Support\Facades\DB;

trait CountPreviousOffersTrait
{

  public function countPreviousOffers($itemId, $userId, $siteId)
  {


      $offerCount = DB::table('offers')
                      ->where([['item_id', '=', $itemId],
                               ['user_id', '=', $userId],
                               ['site_id', '=', $siteId]])

                      ->count();

      return $offerCount;


  }




}
