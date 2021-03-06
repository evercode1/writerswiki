<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'user_id'];

    public function details()
    {

        return $this->hasMany('App\Detail');

    }



}