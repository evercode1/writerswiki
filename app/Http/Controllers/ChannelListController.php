<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChannelListController extends Controller
{
    public function index($name)
    {


        return view('channel-list.index', compact('name'));


    }
}
