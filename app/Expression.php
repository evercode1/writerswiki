<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expression extends Model
{

    protected $fillable = ['label',
                           'slug',
                           'is_active',
                           'user_id',
                           'emotion_id',
                           'description'];

    public function emotion()
    {
        return $this->belongsTo('App\Emotion');
    }



}