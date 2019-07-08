<?php

namespace App\Http\Controllers;

use App\Events\UserAppliedForContributorStatus;
use App\Rules\MustHaveProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contributor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;

class ContributorController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index()
    {

        $contributor = Auth::user()->showContributorStatus();

        return view('contributor.index', compact('contributor'));

    }

    public function store(Request $request)
    {

        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'body' => 'required|string|max:400',
            'user' => new MustHaveProfile(),

        ]);


        $contributor = Contributor::create([ 'user_id' => Auth::id(),
                                             'description' => $request->body]);



        DB::transaction(function () use ($contributor) {

            $contributor->save();

            $user = Auth::user();

            $user->applyContributorStatus();

        });

        $user = User::where('id', Auth::id())->first();

        event(new UserAppliedForContributorStatus($user));


        return Redirect::route('contributor.index');

    }



}
