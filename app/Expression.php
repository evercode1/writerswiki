<?php

namespace App;

use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Database\Eloquent\Model;

class Expression extends Model
{
    use OwnsRecord;

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