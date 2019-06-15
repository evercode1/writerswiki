<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingContributorsController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {


        return view('pending-contributors.index');


    }
}
