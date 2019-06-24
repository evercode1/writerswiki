<?php

namespace App\Http\Controllers;

use App\MediaLinkType;
use Illuminate\Http\Request;
use App\MediaLink;



class AllMediaLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function articles()
    {

        return view('all-media-links.articles');

    }

    public function media($id)
    {

        $view = 'all-media-links.' . $id;

        $type = MediaLinkType::where('name', $id)->first();

        $type = $type->id;

        return view($view, compact('type'));

    }


    public function books()
    {

        return view('all-media-links.books');

    }

    public function groups()
    {

        return view('all-media-links.groups');

    }

    public function services()
    {

        return view('all-media-links.services');

    }

    public function sites()
    {

        return view('all-media-links.sites');

    }

    public function socials()
    {

        return view('all-media-links.socials');

    }

    public function videos()
    {

        return view('all-media-links.videos');

    }


}