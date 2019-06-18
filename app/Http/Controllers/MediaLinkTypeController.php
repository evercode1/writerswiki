<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\MediaLinkType;


class MediaLinkTypeController extends Controller
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

        return view('media-link-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {


           return view('media-link-type.create');

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

                    'name' => 'required|unique:media_link_types|string|max:100',
                    'is_active' => 'required|boolean'



                ]);


        $mediaLinkType = MediaLinkType::create([ 'name' => $request->name,
                                                 'is_active' => $request->is_active]);

        $mediaLinkType->save();


        return Redirect::route('media-link-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $mediaLinkType = MediaLinkType::findOrFail($id);

        return view('media-link-type.show', compact('mediaLinkType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $mediaLinkType = MediaLinkType::findOrFail($id);


        return view('media-link-type.edit', compact('mediaLinkType'));

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

            'name' => 'required|string|max:100|unique:media_link_types,name,' .$id,
            'is_active' => 'required|boolean'

            ]);

        $mediaLinkType = MediaLinkType::findOrFail($id);

        $this->setUpdatedModelValues($request, $mediaLinkType);


        $mediaLinkType->save();

        return Redirect::route('media-link-type.show', ['mediaLinkType' => $mediaLinkType]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        MediaLinkType::destroy($id);

        return Redirect::route('media-link-type.index');

    }


        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->is_active = $request->get('is_active');


    }

}