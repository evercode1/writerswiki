<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ProfileQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('profiles')
                ->select('profiles.id as Id',
                         'profiles.name as Name',
                         'profiles.slug as Slug',
                         'profiles.image_extension as Ext',
                         'users.name as User',
                         'users.id as UserId',
                         DB::raw('DATE_FORMAT(profiles.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'user_id', '=', 'users.id')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('profiles')
                ->select('profiles.id as Id',
                         'profiles.name as Name',
                         'profiles.slug as Slug',
                         'profiles.image_extension as Ext',
                         'users.name as User',
                         'users.id as UserId',
                         DB::raw('DATE_FORMAT(profiles.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'user_id', '=', 'users.id')
                ->where('profiles.name', 'like', '%' . $keyword . '%')
                ->orWhere('users.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}