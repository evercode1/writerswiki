<?php

namespace App\Http\Controllers;

use App\OfferEngine\CounterOffer;
use App\OfferEngine\OfferTraits\CounterOfferFinalCheckTrait;
use App\OfferEngine\OfferTraits\UpdateOfferAsAcceptedAndFinalTrait;
use Illuminate\Http\Request;
use App\Offer;
use App\OfferEngine\OfferDetails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HaggleController extends Controller
{
    use CounterOfferFinalCheckTrait, UpdateOfferAsAcceptedAndFinalTrait;

    public $offerDetails;
    public $negotiationResult;
    public $counterOffer;
    public $isCounterOfferFinal;
    public $isCounterOfferMatchedToUserOffer;
    public $isAccepted = 0;


    public function index()
    {

        $this->truncateOffers();


        return view ('haggle.index');

    }

    public function counter(Request $request)
    {

        $this->setOfferDetails($request);

        $this->checkForPreviousFinalOffer();

        $negotiate = new CounterOffer($this->offerDetails);

        $this->negotiationResult = $negotiate->runCounterOffer();

        $this->setCounterOfferAndFinalStatus();

        $this->isMatchedAndAcceptedOffer();

        $this->saveNegotiationDetails();


        return ['counterOffer' => $this->counterOffer,
                'offerQuality' => $this->offerDetails['offerQuality'],
                'offer' => $this->offerDetails['offer'],
                'isCounterOfferFinal' => $this->isCounterOfferFinal,
                'isCounterOfferMatchedToUserOffer' => $this->isCounterOfferMatchedToUserOffer];

    }

    public function setCounterOfferAndFinalStatus()
    {

        $this->counterOffer = $this->negotiationResult['counterOffer'];

        $this->isCounterOfferFinal = $this->negotiationResult['finalOffer'];



    }

    public function checkForPreviousFinalOffer()
    {

        // to be determined


    }

    public function accept(Request $request)
    {

        $this->updateOfferAsAcceptedAndFinal($request);

    }

    public function setOfferDetails(Request $request)
    {

        $offerDetails = new OfferDetails($request);


        $this->offerDetails = json_decode(json_encode($offerDetails), true);

    }




    public function saveNegotiationDetails(): void
    {

        $offer = Offer::create(['user_id'        => (int) $this->offerDetails['userId'],
                                'item_id'        => (int) $this->offerDetails['itemId'],
                                'offer'          => (int) $this->offerDetails['offer'],
                                'counter_offer'  => (int) $this->counterOffer,
                                'is_accepted'    => $this->isAccepted,
                                'is_final_counter_offer' => $this->isCounterOfferFinal,
                                'is_counter_offer_matched_to_user_offer' => $this->isCounterOfferMatchedToUserOffer,
                                'offer_quality'  => $this->offerDetails['offerQuality'],
                                'offer_quality_id' => (int) $this->formatOfferQualityId(),
                                'site_id' => (int) $this->offerDetails['siteId']]);

        $offer->save();
    }

    public function formatOfferQualityId()
    {

        $value = Str::kebab($this->offerDetails['offerQuality']);

        return Config::get('offer-quality.offer-quality.'.$value);


    }


    public function isMatchedAndAcceptedOffer()
    {

        $this->isCounterOfferMatchedToUserOffer = $this->counterOffer == $this->offerDetails['offer'] ? 1 : 0;

        $this->isAccepted = $this->counterOffer == $this->offerDetails['offer'] ? 1 : 0;

    }

    public function truncateOffers()
    {
        DB::table('offers')->truncate();

    }

}
