<?php

Namespace App\Queries;

use Illuminate\Support\Facades\DB;


class CategoriesForDropdownQuery
{

    public static function data()
    {


       $rows  = DB::table('categories')
              ->select('categories.id as id',
                       'categories.name as name')
              ->orderBy('categories.name', 'asc')
              ->get();



        return $rows;

    }








}
