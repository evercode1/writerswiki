<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllChannelsQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('channels')
                    ->select('id as Id',
                             'name as Name',
                             'slug as Slug',
                             'description as Description',
                             DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created'))
                    ->where('is_active', 1)
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('channels')
                ->select('id as Id',
                         'name as Name',
                         'slug as Slug',
                         'description as Description',
                         DB::raw('DATE_FORMAT(created_at,
                                 "%m-%d-%Y") as Created'))
                ->where([['name', 'like', '%' . $keyword . '%'], ['is_active', 1]])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}