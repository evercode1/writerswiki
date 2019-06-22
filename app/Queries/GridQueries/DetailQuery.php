<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class DetailQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('details')
                ->select('details.id as Id',
                         'details.label as Label',
                         'details.slug as Slug',
                         'details.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'descriptions.name as Description',
                          DB::raw('DATE_FORMAT(details.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'details.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'details.user_id', '=', 'profiles.user_id')
                ->leftJoin('descriptions', 'details.description_id', '=', 'descriptions.id')
                ->orderBy($column, $direction, $type)
                ->paginate(10);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('details')
                ->select('details.id as Id',
                         'details.label as Label',
                         'details.slug as Slug',
                         'details.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'descriptions.name as Description',
                          DB::raw('DATE_FORMAT(details.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'details.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'details.user_id', '=', 'profiles.user_id')
                ->leftJoin('descriptions', 'details.descriptions_id', '=', 'descriptions.id')
                ->where('details.label', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orWhere('descriptions.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

        return $rows;

    }

}