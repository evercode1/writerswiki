<?php

namespace App\OfferEngine\OfferTraits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait ScenarioTraits
{


    public function truncateOffers()
    {
        DB::table('offers')->truncate();

    }


}
