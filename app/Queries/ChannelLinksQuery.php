<?php

namespace App\Queries;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelLinksQuery
{

    public static function sendData($author, Request $request)
    {

        $type = DB::table('media_link_types')->where('name', 'Videos')->value('id');
        $column = $request->get('column');
        $direction = $request->get('direction');
        $keyword = $request->get('keyword');




        $direction == 1 ? $direction = 'asc' : $direction = 'desc';


        if($column == null){

            $column = 'media_links.id';

        }



        if($column == 'created_at'){

            $column = 'media_links.created_at';

        }

        if($column == 'Submitted By'){

            $column = 'profiles.name';

        }


        if($column == 'Title'){

            $column = 'media_links.name';

        }


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
                'subcategories.name as Subcategory',
                DB::raw('DATE_FORMAT(media_links.created_at,
                             "%m-%d-%Y") as Created'))
            ->leftJoin('users', 'media_links.user_id', '=', 'users.id')
            ->leftJoin('profiles', 'media_links.user_id', '=', 'profiles.user_id')
            ->leftJoin('categories', 'category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'subcategory_id', '=', 'subcategories.id')
            ->where([['media_links.media_link_type_id', $type], ['media_links.author', $author ]])
            ->orWhere([['media_links.media_link_type_id', $type], ['media_links.author', $author ], ['media_links.name', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['media_links.author', $author ], ['categories.name', 'like', '%' . $keyword . '%']])
            ->orWhere([['media_links.media_link_type_id', $type], ['media_links.author', $author ], ['subcategories.name', 'like', '%' . $keyword . '%']])
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;




    }



}
