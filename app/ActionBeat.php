<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionBeat extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'user_id'];


    public function actionBeatDescriptions()
    {

        return $this->hasMany('App\ActionBeatDescription');


    }

}