<?php

namespace App;

use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use OwnsRecord;

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