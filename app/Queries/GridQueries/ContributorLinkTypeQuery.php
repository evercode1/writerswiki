<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ContributorLinkTypeQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('contributor_link_types')
                    ->select('id as Id',
                             'name as Name',
                             'is_active as Active',
                             DB::raw('DATE_FORMAT(created_at,
                             "%m-%d-%Y") as Created'))
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('contributor_link_types')
                ->select('id as Id',
                         'name as Name',
                         'is_active as Active',
                         DB::raw('DATE_FORMAT(created_at,
                                 "%m-%d-%Y") as Created'))
                ->where('name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}