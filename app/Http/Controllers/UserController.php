<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use DB;
use App\User;
use Redirect;
use App\Rules\OnOrNull;
use App\Contributor;

class UserController extends Controller
{
    public function __construct()

    {
        $this->middleware(['auth', 'admin']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        return view('user.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);


        return view('user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $user = User::findOrFail($id);

        $contributor = Contributor::where('user_id', $id)->first();

        return view('user.edit', compact('user', 'contributor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        $this->validate($request, [

            'name' => 'required|string|max:20|unique:users,name,' . $user->id,
            'is_subscribed' => new OnOrNull,
            'is_admin' => new OnOrNull,
            'is_contributor' => new OnOrNull,
            'contributor_status' => 'in:0,5,7,10',
            'status_id' => 'in:5,7,10',

        ]);


        $user->updateUser($user, $request);


        return Redirect::route('user.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::route('user.index');

    }
}
