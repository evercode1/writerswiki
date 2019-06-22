<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MediaLinkType;
use EmotionSeeder;

class TestController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);


    }

    public function index()
    {





        return view('test.index');


    }






}
