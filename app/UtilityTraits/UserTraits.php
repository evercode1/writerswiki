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
    use KebabHelper;

    public function applyContributorStatus()
    {

        $user = Auth::user();

        return $user->update(['contributor_status' => 7]);

    }

    public function isAdmin()
    {

        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus()
    {

        return Auth::user()->status_id == 10;
    }

    public function isContributor()
    {

        return Auth::user()->is_contributor == 1;

    }

    public function formatContributorStatus($value)
    {

        switch ($value){

            case 0:

                return 'Rejected';
                break;

            case 5:

                return 'None';
                break;

            case 7:

                return 'Pending';
                break;

            case 10:

                return 'Active';
                break;

            default:

                return 'None';

        }


    }


    public function isSubscribed()
    {

        return Auth::user()->is_subscribed == 1;
    }

    public function isUserAdmin($user)
    {

        return $user->is_admin == 1;


    }

    public function isUserContributor($user)
    {

        return $user->is_contributor == 1;
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

    public function showContributorStatus()
    {
        $status = Auth::user()->contributor_status;

        switch ($status){

            case 0:
                return 'Rejected';
                break;

            case 5:
                return 'Not Applied';
                break;

            case 7:
                return 'Pending';
                break;

            case 10:
                return 'Approved';
                break;

            default:

                return 'not applied';



        }

    }

    public function showStatusName($status)
    {

        return $status === 10 ?  'Active' : 'Inactive';


    }

    public function profileThumb()
    {

        $name = Auth::user()->profiles->name;

        $name = $this->formatString($name);

        return '/imgs/profile/thumbnails/thumb-' . $name . '.jpg';


    }



}