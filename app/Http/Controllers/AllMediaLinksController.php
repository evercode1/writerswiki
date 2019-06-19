<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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