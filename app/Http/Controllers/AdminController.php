<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MediaLink;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);

    }

    public function index()
    {

        $users = User::count();

        $contributors = User::where('is_contributor', 1)->count();

        $links = MediaLink::where('is_active', 1)->count();


        return view('admin.index', compact('users', 'contributors', 'links'));

    }
}
