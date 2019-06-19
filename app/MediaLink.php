<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaLink extends Model
{

    protected $fillable = ['name',
                           'author',
                           'url',
                           'media_link_type_id',
                           'category_id',
                           'subcategory_id',
                           'user_id',
                           'is_active'
                           ];


    public function mediaLinkTypes()
    {

        return $this->belongsTo('App\MediaLinkType');

    }



}