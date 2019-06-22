<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ActionBeatQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('action_beats')
                    ->select('action_beats.id as Id',
                             'action_beats.name as Name',
                             'action_beats.slug as Slug',
                             'action_beats.is_active as Active',
                             'profiles.name as Contributor',
                             'profiles.id as Profile',
                              DB::raw('DATE_FORMAT(action_beats.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('users', 'action_beats.user_id', '=', 'users.id')
                    ->leftJoin('profiles', 'action_beats.user_id', '=', 'profiles.user_id')
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('action_beats')
                ->select('action_beats.id as Id',
                         'action_beats.name as Name',
                         'action_beats.slug as Slug',
                         'action_beats.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         DB::raw('DATE_FORMAT(action_beats.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'action_beats.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'action_beats.user_id', '=', 'profiles.user_id')
                ->where('action_beats.name', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}