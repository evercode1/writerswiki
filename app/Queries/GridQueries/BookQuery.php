<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class BookQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {

        $rows = DB::table('books')
                    ->select('books.id as Id',
                             'books.name as Name',
                             'books.author as Author',
                             'books.url as Url',
                             'books.slug as Slug',
                             'books.is_active as Active',
                             'profiles.name as Contributor',
                             'profiles.id as Profile',
                             'categories.name as Category',
                             'subcategories.name as Subcategory',
                             DB::raw('DATE_FORMAT(books.created_at,
                             "%m-%d-%Y") as Created'))
                    ->leftJoin('users', 'books.user_id', '=', 'users.id')
                    ->leftJoin('profiles', 'books.user_id', '=', 'profiles.user_id')
                    ->leftJoin('categories', 'category_id', '=', 'categories.id')
                    ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
                    ->orderBy($column, $direction)
                    ->paginate(10);

             return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('books')
                ->select('books.id as Id',
                         'books.name as Name',
                         'books.author as Author',
                         'books.url as Url',
                         'books.slug as Slug',
                         'books.is_active as Active',
                         'profiles.name as Contributor',
                         'profiles.id as Profile',
                         'categories.name as Category',
                         'subcategories.name as Subcategory',
                         DB::raw('DATE_FORMAT(books.created_at,
                             "%m-%d-%Y") as Created'))
                ->leftJoin('users', 'books.user_id', '=', 'users.id')
                ->leftJoin('profiles', 'books.user_id', '=', 'profiles.user_id')
                ->leftJoin('categories', 'category_id', '=', 'categories.id')
                ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
                ->where('books.name', 'like', '%' . $keyword . '%')
                ->orWhere('books.author', 'like', '%' . $keyword . '%')
                ->orWhere('profiles.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}