<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllEmotionsQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('emotions')
            ->select('emotions.id as Id',
                'emotions.name as Name',
                'emotions.slug as Slug',
                'emotions.is_active as Active',
                DB::raw('DATE_FORMAT(emotions.created_at,
                             "%m-%d-%Y") as Created'))
            ->leftJoin('users', 'emotions.user_id', '=', 'users.id')

            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('emotions')
            ->select('emotions.id as Id',
                'emotions.name as Name',
                'emotions.slug as Slug',
                'emotions.is_active as Active',
                DB::raw('DATE_FORMAT(emotions.created_at,
                             "%m-%d-%Y") as Created'))
            ->leftJoin('users', 'emotions.user_id', '=', 'users.id')
            ->leftJoin('profiles', 'emotions.user_id', '=', 'profiles.user_id')
            ->where('emotions.name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;

    }

}