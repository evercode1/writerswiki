<?php

namespace App;

use App\UtilityTraits\ShowsImages;
use Illuminate\Database\Eloquent\Model;

    

class Profile extends Model
{
    use ShowsImages;

    protected $fillable = ['name',
                           'description',
                           'is_contributor',
                           'contributor_status',
                           'user_id',
                           'slug',
                           'image_name',
                           'image_extension'];

    public function user()
   {

       return $this->belongsTo('App\User');

   }
}