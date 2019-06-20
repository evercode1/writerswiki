<?php

namespace App\Queries\GridQueries;

use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class UserQuery implements DataQuery
{
    public function data($column, $direction, $type)
    {
        $rows = DB::table('users')
              ->select('id as Id',
                       'name as Name',
                       'email as Email',
                       'status_id as Status',
                       'is_subscribed as Subscribed',
                       'is_admin as Admin',
                       'is_contributor as Contributor',
                       'contributor_status as Constat',
                       DB::raw('DATE_FORMAT(created_at,"%m-%d-%Y") as Joined'))
              ->orderBy($column, $direction)
              ->paginate(5);

        return $rows;

    }

    public function filteredData($column, $direction, $keyword, $type)
    {
        $rows = DB::table('users')
                ->select('id as Id',
                         'name as Name',
                         'email as Email',
                         'status_id as Status',
                         'is_subscribed as Subscribed',
                         'is_admin as Admin',
                         'is_contributor as Contributor',
                         'contributor_status as Constat',
                DB::raw('DATE_FORMAT(created_at,"%m-%d-%Y") as Joined'))
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(5);

        return $rows;

    }
}