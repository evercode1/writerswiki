<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ExpressionQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('expressions')
                    ->select('expressions.id as Id',
                             'expressions.label as Label',
                             'expressions.slug as Slug',
                             'expressions.is_active as Active',
                             'profiles.name as Contributor',
                             'profiles.id as Profile',
                             'emotions.name as Emotion',
                             DB::raw('DATE_FORMAT(expressions.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('users', 'expressions.user_id', '=', 'users.id')
                    ->leftJoin('profiles', 'expressions.user_id', '=', 'profiles.user_id')
                    ->leftJoin('emotions', 'expressions.emotion_id', '=', 'emotions.id')
                    ->orderBy($column, $direction, $type)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('expressions')
                ->select('expressions.id as Id',
                         'expressions.label as Label',
                         'expressions.slug as Slug',
                         'expressions.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'emotions.name as Emotion',
                         DB::raw('DATE_FORMAT(expressions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'expressions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'expressions.user_id', '=', 'profiles.user_id')
                ->leftJoin('emotions', 'expressions.emotion_id', '=', 'emotions.id')
                ->where('expressions.label', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orWhere('emotions.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}