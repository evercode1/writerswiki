<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UnsubscribeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function edit()
    {

        $user = Auth::user();

        return view('unsubscribe.edit', compact('user'));

    }

    public function store()
    {

        $user = Auth::user();

        $user->update(['is_subscribed' => 0]);

        return Redirect::route('unsubscribe-confirmation');


    }

    public function confirm()
    {

        return view('unsubscribe.confirmation');

    }
}
