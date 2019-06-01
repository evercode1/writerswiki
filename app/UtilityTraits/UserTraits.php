<?php
/**
 * Created by PhpStorm.
 * User: billk
 * Date: 5/31/19
 * Time: 11:02 PM
 */

namespace App\UtilityTraits;

use Illuminate\Support\Facades\Auth;

trait UserTraits
{

    public function isAdmin()
    {

        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus()
    {

        return Auth::user()->status_id == 10;
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

        return $user->status_id == 10;


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