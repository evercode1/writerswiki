<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class DescriptionDetailQuery implements DataQuery
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
                             'descriptions.id as DescriptionId',
                             DB::raw('DATE_FORMAT(details.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('users', 'details.user_id', '=', 'users.id')
                    ->leftJoin('profiles', 'details.user_id', '=', 'profiles.user_id')
                    ->leftJoin('descriptions', 'details.description_id', '=', 'descriptions.id')
                    ->where('descriptions.id', $type)
                    ->orderBy($column, $direction)
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
                         'descriptions.id as DescriptionId',
                         DB::raw('DATE_FORMAT(details.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'details.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'details.user_id', '=', 'profiles.user_id')
                ->leftJoin('descriptions', 'details.description_id', '=', 'descriptions.id')
                ->where([['details.description_id', $type],['details.label', 'like', '%' . $keyword . '%']])
                ->orWhere([['details.description_id', $type],['profiles.name', 'like', '%' . $keyword . '%']])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}