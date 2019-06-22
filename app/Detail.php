<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    protected $fillable = ['label',
                           'slug',
                           'is_active',
                           'description',
                           'user_id',
                           'description_id'];


    public function description()
    {

        return $this->belongsTo('App\Description');

    }

}