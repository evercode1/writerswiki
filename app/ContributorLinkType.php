<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributorLinkType extends Model
{

    protected $fillable = ['name',
                           'is_active'];

    // Begin ContributorLink Relationship

    public function contributorLinks()
    {

       return $this->hasMany('App\ContributorLink');

    }

    // End ContributorLink Relationship



}