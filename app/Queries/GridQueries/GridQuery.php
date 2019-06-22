<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use DB;


class GridQuery
{

    public static function sendData(Request $request, $query, $type=null)
    {



        $class = '\\App\Queries\GridQueries\\' . $query;

        $query =  new $class();

        // set sort by column and direction

        list($column, $direction) = static::setSort($request, $query);


        // search by keyword with column sort


        if ($request->has('keyword')) {

            return static::keywordFilter($request, $query, $column, $direction, $type);


        }

        // return data

        return static::getData($query, $column, $direction, $type);





    }

    public static function setSort(Request $request, $query)
    {

        // set sort by column with default

        list($column, $direction) = static::setDefaults($query);


        if ($request->has('column')) {

            $column = $request->get('column');

            if ($column == 'Id') {
                $direction = $request->get('direction') == 1 ? 'asc' : 'desc';

                return [$column, $direction];

            } else {

                $direction = $request->get('direction') == 1 ? 'desc' : 'asc';

                return [$column, $direction];
            }


        }

        return [$column, $direction];
    }

    public static function setDefaults($query)
    {

        switch ($query){

            case 'query instance of your special case' :

                $column = 'your column';
                $direction = 'your order';

                break;

            case $query instanceof ActionBeatDetailsQuery  :

                $column = 'label';
                $direction = 'asc';

                break;


            case $query instanceof EmotionQuery  :

                $column = 'name';
                $direction = 'asc';

                break;

            case $query instanceof AllEmotionsQuery  :

                $column = 'name';
                $direction = 'asc';

                break;

            case $query instanceof EmotionExpressionQuery  :

                $column = 'label';
                $direction = 'asc';

                break;

            default:

                $column = 'id';
                $direction = 'asc';

                break;

        }

        return list($column, $direction) = [$column, $direction];


    }

    public static function keywordFilter(Request $request, $query, $column, $direction, $type)
    {
        $keyword = $request->get('keyword');

        return response()->json($query->filteredData($column,
                                                     $direction,
                                                     $keyword, $type));

    }


    public static function getData($query, $column, $direction, $type)
    {

        return response()->json($query->data($column, $direction, $type));

    }


}