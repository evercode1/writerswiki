<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class ActionBeatDescriptionQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('action_beat_descriptions')
                ->select('action_beat_descriptions.id as Id',
                         'action_beat_descriptions.label as Label',
                         'action_beat_descriptions.slug as Slug',
                         'action_beat_descriptions.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'action_beats.name as Action',
                DB::raw('DATE_FORMAT(action_beat_descriptions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'action_beat_descriptions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'action_beat_descriptions.user_id', '=', 'profiles.user_id')
                ->leftJoin('action_beats', 'action_beat_descriptions.action_beat_id', '=', 'action_beats.id')
                ->orderBy($column, $direction)
                ->paginate(5);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('action_beat_descriptions')
                ->select('action_beat_descriptions.id as Id',
                         'action_beat_descriptions.label as Label',
                         'action_beat_descriptions.slug as Slug',
                         'action_beat_descriptions.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'action_beats.name as Action',
                DB::raw('DATE_FORMAT(action_beat_descriptions.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'action_beat_descriptions.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'action_beat_descriptions.user_id', '=', 'profiles.user_id')
                ->leftJoin('action_beats', 'action_beat_descriptions.action_beat_id', '=', 'action_beats.id')
                ->where('action_beat_descriptions.label', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orWhere('action_beats.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(5);

        return $rows;

    }

}