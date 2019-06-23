<?php

namespace App;

use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Database\Eloquent\Model;

class ActionBeatDescription extends Model
{
    use OwnsRecord;

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