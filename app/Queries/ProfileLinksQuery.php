<?php

Namespace App\Queries;

use DB;


class ProfileLinksQuery
{

    public static function data($userId)
    {

        $links = DB::table('contributor_links')
                 ->select('contributor_links.id as Id',
                          'contributor_links.name as Name',
                          'contributor_links.url as Url',
                          'users.name as User',
                          'contributor_link_types.name as ContributorLinkType',
                          'contributor_link_types.id as ContributorLinkTypeId')
                 ->leftJoin('contributor_link_types', 'contributor_link_type_id', '=', 'contributor_link_types.id')
                 ->leftJoin('users', 'user_id', '=', 'users.id')
                 ->where('contributor_links.user_id', $userId)
                 ->get();

        $links = $links->groupBy('ContributorLinkType');

        return $links;




    }



}
