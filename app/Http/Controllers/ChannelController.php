<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Channel;


class ChannelController extends Controller
{
    use KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'show']);



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('channel.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {




           return view('channel.create');

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

                    'name' => 'required|unique:channels|string|max:100',
                    'is_active' => 'required|boolean',
                    'body' => 'required|string|max:1000'


                ]);

        $slug = Str::slug($request->name, "-");


        $channel = Channel::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'description' => $request->body]);

        $channel->save();


        return Redirect::route('channel.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $channel = Channel::findOrFail($id);

        return view('channel.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $channel = Channel::findOrFail($id);


        return view('channel.edit', compact('channel'));

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

            'name' => 'required|string|max:100|unique:channels,name,' .$id,
            'is_active' => 'required|boolean',
            'body' => 'required|string|max:1000'

            ]);

        $channel = Channel::findOrFail($id);

        $slug = Str::slug($request->name, "-");

        $this->setUpdatedModelValues($request, $channel, $slug);


        $channel->save();



        return Redirect::route('channel.show', ['channel' => $channel, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Channel::destroy($id);

        return Redirect::route('channel.index');

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
        $modelInstance->description = $request->get('body');


    }

}