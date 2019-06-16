<?php

Namespace App\Queries;

use Illuminate\Support\Facades\DB;


class SubcategoriesForDropdownQuery
{

    public static function data($categoryId)
    {


        $rows = DB::table('subcategories')
            ->select('subcategories.id as id',
                'subcategories.name as name')
            ->where('subcategories.category_id' , $categoryId)
            ->orderBy('subcategories.name', 'asc')
            ->get();

        return $rows;

    }








}
