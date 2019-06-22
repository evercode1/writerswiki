<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionBeatDescription extends Model
{

    protected $fillable = ['label',
                           'slug',
                           'is_active',
                           'description',
                           'user_id',
                           'action_beat_id'];

    public function actionBeat()
    {

        return $this->belongsTo('App\ActionBeat');

    }



}