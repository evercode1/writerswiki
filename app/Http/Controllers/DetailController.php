<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Detail;
use App\Description;
use Illuminate\Support\Facades\Auth;
use App\Http\AuthTraits\OwnsRecord;
use App\User;
use Illuminate\Support\Facades\DB;


class DetailController extends Controller
{
    use OwnsRecord;


    public function __construct()
    {
        $this->middleware(['auth'], ['except' => 'show']);

        $this->middleware(['contributor'], ['only' => 'create', 'createPreset', 'edit', 'update']);

        $this->middleware(['admin'], ['only' => 'destroy']);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('detail.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $descriptions = Description::orderBy('name', 'asc')->get();


        return view('detail.create', compact('descriptions'));

    }

    public function createPreset($type)
    {

        $description = Description::where('id', $type)->first();


        return view('detail.create-preset', compact('description'));

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
            'description_id' => 'required|integer',
            'body'=> 'required|string'

        ]);


        $slug = $this->slug($request);


        $detail = Detail::create([ 'label' => $request->label,
                                           'slug' => $slug,
                                           'user_id' => Auth::id(),
                                           'description_id' => $request->description_id,
                                           'is_active' => $request->is_active,
                                           'description' => $request->body]);

        $detail->save();
        


        return Redirect::route('description-detail.index', ['type' => $detail->description_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $detail = Detail::findOrFail($id);

        $user = User::where('id', $detail->user_id)->first();

        $userid = $user->id;
        $username = $user->profiles->name;
        $profile = $user->profiles->id;
        $thumb = $user->getProfileThumb($user);
        $tagline = $user->profiles->tagline;

        $description = DB::table('descriptions')->where('id', $detail->description_id)->value('name');

        $descriptionId = DB::table('descriptions')->where('id', $detail->description_id)->value('id');

        $seo = 'How to describe a ' . strtolower($description) . ' in writing with ' . strtolower($detail->label) . '.';

        return view('detail.show', compact('detail', 'description', 'username', 'descriptionId',
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

        $detail = Detail::findOrFail($id);

        $descriptions = Description::where('is_active', 1)->orderBy('name', 'asc')->get();

        $description = DB::table('descriptions')->where('id', $detail->description_id)->value('name');

        $descriptionId = DB::table('descriptions')->where('id', $detail->description_id)->value('id');


        return view('detail.edit', compact('detail', 'descriptions', 'description', 'descriptionId'));

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
            'description_id' => 'required|integer',
            'body'=> 'required|string'

        ]);

        $detail = Detail::findOrFail($id);

        $slug = $this->slug($request);

        $this->setUpdatedModelValues($request, $detail, $slug);

        $detail->save();

        return Redirect::route('detail.show', ['detail' => $detail, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Detail::destroy($id);

        return Redirect::route('detail.index');

    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->label = $request->get('label');
        $modelInstance->slug = $slug;
        $modelInstance->description_id = $request->get('description_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');


    }

    /**
     * @param Request $request
     * @return string
     */
    private function slug(Request $request)
    {
        $description = DB::table('descriptions')->where('id', $request->description_id)->value('name');

        $description = strtolower($description);

        $slug = 'How-to-describe-' . $description . '-in-writing-with-' . Str::slug($request->label, "-");

        return $slug;

    }

}