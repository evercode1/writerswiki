<?php
namespace App\OfferEngine\OfferTraits;

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait UpdateOfferAsAcceptedAndFinalTrait
{

    public function updateOfferAsAcceptedAndFinal(Request $request)
    {



            $counterOffer = DB::table('offers')
                            ->where([['item_id', '=', $request->itemId],
                                     ['user_id', '=', $request->userId],
                                     ['counter_offer', '=', $request->counterOffer],
                                     ['site_id', '=', $request->siteId]])
                            ->orderBy('id', 'desc')
                            ->first();

            $counterOffer = data_get($counterOffer, 'id');




        $counterOfferUpdate = Offer::findOrFail($counterOffer);

        $counterOfferUpdate->is_accepted = 1;

        $counterOfferUpdate->is_final_counter_offer = 1;

        $counterOfferUpdate->save();


    }




}
