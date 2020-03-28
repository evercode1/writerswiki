<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['user_id',
                           'item_id',
                           'offer',
                           'counter_offer',
                           'is_accepted',
                           'offer_quality'];
}
