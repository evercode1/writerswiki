<?php
namespace App\Http\AuthTraits;

use Illuminate\Support\Facades\Auth;

trait OwnsRecord
{
    public function userNotOwnerOf($modelRecord)
    {
        return $modelRecord->user_id != Auth::id();
    }

    public function currentUserOwns($modelRecord)
    {
        return $modelRecord->user_id === Auth::id();
    }

    public function adminOrCurrentUserOwns($modelRecord)
    {
        if (Auth::user()->isAdmin()){
            return true;
        }
        return $modelRecord->user_id === Auth::id();
    }

    public function adminOrContributorOwns($modelRecord)
    {
        if (Auth::user()->isAdmin()){
            return true;
        }

        if (! Auth::user()->isContributor()){
            return false;
        }


        return $modelRecord->user_id === Auth::id();
    }

    public function allowUserUpdate($userId)
    {



        if (Auth::user()->isAdmin()){

            return true;

        }


        return $userId == Auth::id();

    }

}