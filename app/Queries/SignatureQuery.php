<?php

Namespace App\Queries;

use DB;


class SignatureQuery
{

    public static function data($userId)
    {

        $links = DB::table('contributor_links')
                 ->select('contributor_links.id as Id',
                          'contributor_links.name as Name',
                          'contributor_links.url as Url',
                          'users.name as User',
                          'profiles.name as Contributor',
                          'contributor_link_types.name as ContributorLinkType',
                          'contributor_link_types.id as ContributorLinkTypeId')
                 ->leftJoin('contributor_link_types', 'contributor_link_type_id', '=', 'contributor_link_types.id')
                 ->leftJoin('users', 'user_id', '=', 'users.id')
                 ->leftJoin('profiles', 'contributor_links.user_id', '=', 'profiles.user_id')
                 ->where('contributor_links.user_id', $userId)
                 ->get();

        $links = $links->groupBy('ContributorLinkType');

        return $links;




    }



}
