<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaLinkType extends Model
{

    protected $fillable = ['name',
                           'is_active'];


    public function mediaLinks()
    {

        return $this->hasMany('App\MediaLink');


    }



}