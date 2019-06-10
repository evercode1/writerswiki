<?php

namespace App;

use App\UtilityTraits\UserTraits;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable, UserTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_subscribed',
        'is_admin',
        'status_id',
        'is_terms_accepted'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updateUser($user, Request $request)
    {

        $request->is_admin === 'on' ? $isAdmin = true : $isAdmin = false;
        $request->is_subscribed === 'on' ? $isSubscribed = true : $isSubscribed = false;

        return  $user->update(['name'  => $request->name,
                               'email' => $request->email,
                               'is_subscribed' => $isSubscribed,
                               'is_admin' => $isAdmin,
                               'status_id' => $request->status_id,

        ]);


    }

    // Begin Profile Relationship

    public function profiles()
    {

        return $this->hasOne('App\Profile');

    }

    // End Profile Relationship

    



}
