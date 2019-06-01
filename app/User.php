<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

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
        'status',
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


    public function isAdmin()
    {

        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus()
    {

        return Auth::user()->status == 10;
    }

    public function isSubscribed()
    {

        return Auth::user()->is_subscribed == 1;
    }

    public function isUserAdmin($user)
    {

        return $user->is_admin == 1;


    }

    public function isUserSubscribed($user)
    {

        return $user->is_subscribed == 1;


    }

    public function isUserActive($user)
    {

        return $user->status == 10;


    }

    public function showAdminStatusOf($user)
    {

        return $user->is_admin ? 'Yes' : 'No';

    }

    public function showNewsletterStatusOf($user)
    {

        return $user->is_subscribed == 1 ? 'Yes' : 'No';

    }

    public function showStatusName($status)
    {

        return $status === 10 ?  'Active' : 'Inactive';


    }
}
