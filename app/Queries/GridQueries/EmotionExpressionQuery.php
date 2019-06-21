<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class EmotionExpressionQuery implements DataQuery
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
                             'emotions.id as EmoId',
                             DB::raw('DATE_FORMAT(expressions.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('users', 'expressions.user_id', '=', 'users.id')
                    ->leftJoin('profiles', 'expressions.user_id', '=', 'profiles.user_id')
                    ->leftJoin('emotions', 'expressions.emotion_id', '=', 'emotions.id')
                    ->where('emotions.id', $type)
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
                         'emotions.id as EmoId',
                         DB::raw('DATE_FORMAT(expressions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'expressions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'expressions.user_id', '=', 'profiles.user_id')
                ->leftJoin('emotions', 'expressions.emotion_id', '=', 'emotions.id')
                ->where([['expressions.emotion_id', $type],['expressions.label', 'like', '%' . $keyword . '%']])
                ->orWhere([['expressions.emotion_id', $type],['profiles.name', 'like', '%' . $keyword . '%']])
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}