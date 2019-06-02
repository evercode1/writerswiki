<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function about()
    {

        $content = Content::where('name', 'about')->first();


        return view('content.show', compact('content'));


    }

    public function cancelAccountConfirmation()
    {


        $content = Content::where('name', 'cancel account confirmation')->first();


        return view('content.show', compact('content'));


    }

    public function privacy()
    {

        $content = Content::where('name', 'privacy policy')->first();


        return view('content.show', compact('content'));


    }

    public function terms()
    {

        $content = Content::where('name', 'terms of service')->first();


        return view('content.show', compact('content'));


    }
}
