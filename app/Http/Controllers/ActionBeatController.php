<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\ActionBeat;
use App\Http\AuthTraits\OwnsRecord;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class ActionBeatController extends Controller
{
    use OwnsRecord;

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

        return view('action-beat.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {



        return view('action-beat.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|unique:emotions|string|max:100',
            'is_active' => 'required|boolean'

        ]);

        $slug = 'how-to-describe-' . Str::slug($request->name, "-") . '-in-writing';

        $emotion = ActionBeat::create([ 'name' => $request->name,
                                        'slug' => $slug,
                                        'user_id' => Auth::id(),
                                        'is_active' => $request->is_active]);

        $emotion->save();


        return Redirect::route('action-beat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $actionBeat = ActionBeat::findOrFail($id);

        return view('action-beat.show', compact('actionBeat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $actionBeat = ActionBeat::findOrFail($id);

        if( ! $this->adminOrContributorOwns($actionBeat)){

            throw new UnauthorizedException();

        }

        return view('action-beat.edit', compact('actionBeat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name' => 'required|string|max:100|unique:action_beats,name,' .$id,
            'is_active' => 'required|boolean'

        ]);

        $actionBeat = ActionBeat::findOrFail($id);

        if( ! $this->adminOrContributorOwns($actionBeat)){

            throw new UnauthorizedException();

        }

        $slug = 'how-to-describe-' . Str::slug($request->name, "-") . '-in-writing';

        $this->setUpdatedModelValues($request, $actionBeat, $slug);

        $actionBeat->save();


        return Redirect::route('action-beat.show', ['emotion' => $actionBeat, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $actionBeat = ActionBeat::findOrFail($id);

        if( ! $this->adminOrContributorOwns($actionBeat)){

            throw new UnauthorizedException();

        }


        ActionBeat::destroy($id);

        return Redirect::route('action-beat.index');

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->slug = $slug;
        $modelInstance->is_active = $request->get('is_active');


    }

}