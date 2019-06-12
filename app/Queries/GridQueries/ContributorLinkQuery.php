<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ContributorLinkQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('contributor_links')
                ->select('contributor_links.id as Id',
                         'contributor_links.name as Name',
                         'users.name as User',
                         'contributor_link_types.name as ContributorLinkType',
                         'contributor_link_types.id as ContributorLinkTypeId',
                         DB::raw('DATE_FORMAT(contributor_links.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('contributor_link_types', 'contributor_link_type_id', '=', 'contributor_link_types.id')
                ->leftJoin('users', 'user_id', '=', 'users.id')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('contributor_links')
                ->select('contributor_links.id as Id',
                         'contributor_links.name as Name',
                         'users.name as User',
                         'contributor_link_types.name as ContributorLinkType',
                         'contributor_link_types.id as ContributorLinkTypeId',
                         DB::raw('DATE_FORMAT(contributor_links.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('contributor_link_types', 'contributor_link_type_id', '=', 'contributor_link_types.id')
                ->leftJoin('users', 'user_id', '=', 'users.id')
                ->where('contributor_links.name', 'like', '%' . $keyword . '%')
                ->orWhere('contributor_link_types.name', 'like', '%' . $keyword . '%')
                ->orWhere('users.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}