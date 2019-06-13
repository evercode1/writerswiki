<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Rules\OnOrNull;

class SettingsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit()
    {

        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        return view('settings.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [

            'name' => 'required|string|max:20|unique:users,name,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' .$user->id,
            'is_subscribed' => new OnOrNull,


        ]);


        $request->is_subscribed === 'on' ? $isSubscribed = true : $isSubscribed = false;


        $user->update(['name'  => $request->name,
                       'email' => $request->email,
                       'is_subscribed' => $isSubscribed]);

        return redirect()->action('SettingsController@edit', [$user]);

    }

}
