<?php

namespace App\OfferEngine;


class OfferQuality
{


    public static function setOfferQuality($offer, $cost, $bottomPrice, $optimumPrice)
    {

        if ( $offer <= ($cost * .10) ){

            return 'bottom feed';

        }

        if ( $offer <= ($cost * .50) ){

            return 'low ball';

        }

        if ( $offer < $cost ){

            return 'below cost';

        }

        if ( $offer == $cost ){

            return 'at cost';

        }

        if ( $offer <= ( $cost * 1.10 ) ){

            return 'minimal offer';

        }

        if ( $offer <= ( $bottomPrice * 1.10 ) ){

            return 'weak offer';

        }

        if ( $offer > $bottomPrice * 1.10 && $offer < $optimumPrice ){


            return 'solid offer';

        }

        if ( $offer >= $optimumPrice ){


            return 'strong offer';
        }




    }





}
