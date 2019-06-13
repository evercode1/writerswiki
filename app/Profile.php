<?php

namespace App;

use App\UtilityTraits\ShowsImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
    

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

    public function owner($profile)
    {

        return Auth::id() == $profile->user_id;


    }

    public function user()
   {

       return $this->belongsTo('App\User');

   }
}