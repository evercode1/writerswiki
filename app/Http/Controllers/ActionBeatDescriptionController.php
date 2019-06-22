<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\ActionBeatDescription;
use App\ActionBeat;
use App\Http\AuthTraits\OwnsRecord;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class ActionBeatDescriptionController extends Controller
{
    use OwnsRecord;


    public function __construct()
    {
        $this->middleware(['auth'], ['except' => 'show']);

        $this->middleware(['contributor'], ['only' => 'create', 'createPreset']);

        $this->middleware(['admin'], ['only' => 'edit', 'destroy', 'update']);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('action-beat-description.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $actionBeats = ActionBeat::orderBy('name', 'asc')->get();


        return view('action-beat-description.create', compact('actionBeats'));

    }

    public function createPreset($type)
    {

        $actionBeat = ActionBeat::where('id', $type)->first();


        return view('action-beat-description.create-preset', compact('actionBeat'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'label' => 'required|unique:expressions|string|max:40',
            'is_active' => 'required|boolean',
            'action_beat_id' => 'required|integer',
            'body'=> 'required|string'

        ]);


        $slug = $this->slug($request);


        $actionBeatDescription = ActionBeatDescription::create([ 'label' => $request->label,
                                                                 'slug' => $slug,
                                                                 'user_id' => Auth::id(),
                                                                 'action_beat_id' => $request->action_beat_id,
                                                                 'is_active' => $request->is_active,
                                                                 'description' => $request->body]);

        $actionBeatDescription->save();


        return Redirect::route('action-beat-details.index', ['type' => $actionBeatDescription->action_beat_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $actionBeatDescription = ActionBeatDescription::findOrFail($id);

        $user = User::where('id', $actionBeatDescription->user_id)->first();

        $userid = $user->id;
        $username = $user->profiles->name;
        $profile = $user->profiles->id;
        $thumb = $user->getProfileThumb($user);
        $tagline = $user->profiles->tagline;

        $actionBeat = $actionBeatDescription->actionBeat->name;
        $actionBeatId = $actionBeatDescription->actionBeat->id;

        $seo = 'How to describe ' . $actionBeat . ' in writing with ' . $actionBeatDescription->label . '.';

        return view('action-beat-description.show', compact('actionBeatDescription', 'actionBeat', 'username', 'actionBeatId',
                                               'profile', 'thumb', 'tagline', 'userid', 'seo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $actionBeatDescription = ActionBeatDescription::findOrFail($id);

        $actionBeats = ActionBeat::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view('action-beat-description.edit', compact('actionBeatDescription', 'actionBeats'));

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
        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'label' => 'required|string|max:40|unique:expressions,label,' .$id,
            'is_active' => 'required|boolean',
            'action_beat_id' => 'required|integer',
            'body'=> 'required|string'

        ]);

        $actionBeatDescription = ActionBeatDescription::findOrFail($id);

        $slug = $this->slug($request);

        $this->setUpdatedModelValues($request, $actionBeatDescription, $slug);

        $actionBeatDescription->save();

        return Redirect::route('action-beat-description.show', ['actionBeatDescription' => $actionBeatDescription, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        ActionBeatDescription::destroy($id);

        return Redirect::route('action-beat-description.index');

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->label = $request->get('label');
        $modelInstance->slug = $slug;
        $modelInstance->action_beat_id = $request->get('action_beat_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');


    }

    /**
     * @param Request $request
     * @return string
     */
    private function slug(Request $request)
    {
        $actionBeat = DB::table('action_beats')->where('id', $request->action_beat_id)->value('name');

        $actionBeat = strtolower($actionBeat);

        $slug = 'How-to-describe-' . $actionBeat . '-in-writing-with-' . Str::slug($request->label, "-");

        return $slug;
    }

}