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
                           'is_final_counter_offer',
                           'is_counter_offer_matched_to_user_offer',
                           'offer_quality',
                           'offer_quality_id',
                           'site_id'];
}
