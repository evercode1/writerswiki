<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class AllMediaLinksQuery implements DataQuery
{

    public function data($column, $direction, $type)
    {




        $rows = DB::table('media_links')
            ->select('media_links.id as Id',
                'media_links.name as Name',
                'media_links.author as Author',
                'media_links.url as Url',
                'media_links.is_active as Active',
                'media_links.media_link_type_id as Type',
                'profiles.name as Contributor',
                'profiles.id as Profile',
                'categories.name as Category',
                'subcategories.name as Subcategory')
            ->leftJoin('users', 'media_links.user_id', '=', 'users.id')
            ->leftJoin('profiles', 'media_links.user_id', '=', 'profiles.user_id')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
            ->where('media_link_type_id', $type)
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword, $type)
    {

        $rows = DB::table('media_links')
            ->select('media_links.id as Id',
                'media_links.name as Name',
                'media_links.author as Author',
                'media_links.url as Url',
                'media_links.is_active as Active',
                'media_links.media_link_type_id as Type',
                'profiles.name as Contributor',
                'profiles.id as Profile',
                'categories.name as Category',
                'subcategories.name as Subcategory')
            ->leftJoin('users', 'media_links.user_id', '=', 'users.id')
            ->leftJoin('profiles', 'media_links.user_id', '=', 'profiles.user_id')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
            ->where([['media_links.media_link_type_id', $type], ['media_links.name', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['media_links.author', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['profiles.name', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['categories.name', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['subcategories.name', 'like', '%' . $keyword . '%']])
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;

    }

}