<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllDescriptionsQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('descriptions')
                ->select('descriptions.id as Id',
                         'descriptions.name as Name',
                         'descriptions.slug as Slug',
                         'descriptions.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         DB::raw('DATE_FORMAT(descriptions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'descriptions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'descriptions.user_id', '=', 'profiles.user_id')
                ->orderBy($column, $direction)
                ->paginate(10);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('descriptions')
                ->select('descriptions.id as Id',
                         'descriptions.name as Name',
                         'descriptions.slug as Slug',
                         'descriptions.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         DB::raw('DATE_FORMAT(descriptions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'descriptions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'descriptions.user_id', '=', 'profiles.user_id')
                ->where('descriptions.name', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

        return $rows;

    }

}