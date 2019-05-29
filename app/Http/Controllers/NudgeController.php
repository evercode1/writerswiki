<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Nudge;
use Illuminate\Support\Str;


class NudgeController extends Controller
{
    use ManagesImages, KebabHelper;

    public function __construct()
    {

        $this->middleware(['auth']);

       // $this->middleware(['admin'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('nudge');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('nudge.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {




           return view('nudge.create');

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

                    'name' => 'required|unique:nudges|string|max:100',
                    'is_active' => 'required|boolean',

                    'body' => 'required|string|max:1000',
                    'image' => 'max:1000',


                ]);

        $slug = Str::slug($request->name, "-");

        $imageName = $this->formatString($request->get('name'));

        $image = $request->file('image') == null ? null : $request->file('image')->getClientOriginalExtension();

        $nudge = Nudge::create([ 'name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'is_active' => $request->is_active,
                                                                  'galaxy_id' => $request->galaxy_id,
                                                                  'universe_id' => $request->universe_id,
                                                                  'description' => $request->body,
                                                                  'image_name' => $imageName,
                                                                  'image_extension' => $image]);

        $nudge->save();

        if ($request->has('image')){

            // get instance of file

            $file = $this->getUploadedFile();

            // pass in the file and the model

            $this->saveImageFiles($file, $nudge);

        }

        return Redirect::route('nudge.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $nudge = Nudge::findOrFail($id);

        return view('nudge.show', compact('nudge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $nudge = Nudge::findOrFail($id);




        return view('nudge.edit', compact('nudge'));

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

            'name' => 'required|string|max:100|unique:nudges,name,' .$id,
            'is_active' => 'required|boolean',

            'body' => 'required|string|max:1000',
            'image' => 'max:1000',


            ]);

        $nudge = Nudge::findOrFail($id);

        $slug = Str::slug($request->name, "-");

        $this->setUpdatedModelValues($request, $nudge, $slug);

        // if file, we have additional requirements before saving

                if ($this->newFileIsUploaded()) {

                    $this->deleteExistingImages($nudge);

                    $this->setNewFileExtension($request, $nudge);

                }

        $nudge->save();


            // check for file, if new file, overwrite existing file

            if ($this->newFileIsUploaded()){

                $file = $this->getUploadedFile();

                $this->saveImageFiles($file, $nudge);

            }



        return Redirect::route('nudge.show', ['nudge' => $nudge, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $nudge = Nudge::findOrFail($id);

        $this->deleteExistingImages($nudge);

        Nudge::destroy($id);

        return Redirect::route('nudge.index');

    }

    private function setNewFileExtension(Request $request, $modelInstance)
    {

         $modelInstance->image_extension = $request->file('image')->getClientOriginalExtension();

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

        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

}