<?php

namespace App\Http\Controllers;

use App\OfferEngine\CounterOffer;
use App\OfferEngine\OfferTraits\CounterOfferFinalCheckTrait;
use App\OfferEngine\OfferTraits\UpdateOfferAsAcceptedAndFinalTrait;
use App\OfferEngine\OfferTraits\ScenarioTraits;
use Illuminate\Http\Request;
use App\Offer;
use App\OfferEngine\OfferDetails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;


class HaggleController extends Controller
{
    use ScenarioTraits, CounterOfferFinalCheckTrait, UpdateOfferAsAcceptedAndFinalTrait;

    public $offerDetails;
    public $counterOfferAndFinalOfferStatus;
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

        $this->counterOfferAndFinalOfferStatus = $negotiate->runCounterOffer();

        $this->setCounterOfferAndFinalStatus();

        $this->isMatchedAndAcceptedOffer();

        $this->saveOfferAndCounterOffer();


        return ['counterOffer' => $this->counterOffer,
                'offerQuality' => $this->offerDetails['offerQuality'],
                'offer' => $this->offerDetails['offer'],
                'isCounterOfferFinal' => $this->isCounterOfferFinal,
                'isCounterOfferMatchedToUserOffer' => $this->isCounterOfferMatchedToUserOffer];

    }

    public function setCounterOfferAndFinalStatus()
    {

        $this->counterOffer = $this->counterOfferAndFinalOfferStatus['counterOffer'];

        $this->isCounterOfferFinal = $this->counterOfferAndFinalOfferStatus['finalOffer'];



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




    public function saveOfferAndCounterOffer(): void
    {

        $offer = Offer::create(['user_id'        => $this->offerDetails['userId'],
                                'item_id'        => $this->offerDetails['itemId'],
                                'offer'          => (int) $this->offerDetails['offer'],
                                'counter_offer'  => $this->counterOffer,
                                'is_accepted'    => $this->isAccepted,
                                'is_final_counter_offer' => $this->isCounterOfferFinal,
                                'is_counter_offer_matched_to_user_offer' => $this->isCounterOfferMatchedToUserOffer,
                                'offer_quality'  => $this->offerDetails['offerQuality'],
                                'offer_quality_id' => $this->formatOfferQualityId(),
                                'site_id' => $this->offerDetails['siteId']]);

        $offer->save();
    }

    public function formatOfferQualityId()
    {

        $value = Str::kebab($this->offerDetails['offerQuality']);

        return Config::get('offer-quality.offer-quality.'.$value);


    }


    public function isMatchedAndAcceptedOffer()
    {

        $this->isCounterOfferMatchedToUserOffer = $this->counterOffer === $this->offerDetails['offer'] ? 1 : 0;

        $this->isAccepted = $this->counterOffer === $this->offerDetails['offer'] ? 1 : 0;

    }

}
