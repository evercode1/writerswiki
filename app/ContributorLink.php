<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributorLink extends Model
{

    protected $fillable = ['name', 'url', 'user_id', 'contributor_link_type_id'];

    public function contributorLinkType()
   {

       return $this->belongsTo('App\ContributorLinkType');

   }
}