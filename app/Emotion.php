<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'user_id'];

    public function expressions()
    {
        return $this->hasMany('App\Expression');
    }

}