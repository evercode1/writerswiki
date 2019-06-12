<?php

namespace App\Http\Controllers;

use App\Queries\ProfileLinksQuery;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\UtilityTraits\ManagesImages;
use Illuminate\Support\Str;
use App\UtilityTraits\KebabHelper;
use Illuminate\Support\Facades\Auth;
use App\ContributorLink;
use DB;

class ProfileController extends Controller
{
    use ManagesImages, KebabHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

        $this->setImageDefaultsFromConfig('profile');


    }

    public function index()
    {

        return view('profile.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {


        return view('profile.create');

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

           'name' => 'required|unique:contents|string|max:100',
           'is_contributor' => 'required|boolean',
           'body' => 'required|string|max:100000',
           'image' => 'max:1000',


        ]);

        $slug = Str::slug($request->name, "-");


        $profile = Profile::create(['name' => $request->name,
                                    'description' => $request->body,
                                    'slug' => $slug,
                                    'user_id'  => Auth::id(),
                                    'image_name'        => $this->formatString($request->get('name')),
                                    'image_extension'   => $request->file('image')->getClientOriginalExtension()]);



        $profile->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $profile);

        return Redirect::route('profile.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $slug='')
    {
        $profile = Profile::findOrFail($id);

        if ($profile->slug !== $slug) {

            return Redirect::route('profile.show', ['id' => $profile->id,
                                                   'slug' => $profile->slug], 301);

        }

        $user = $profile->user->name;
        $userId = $profile->user->id;


        $links = ProfileLinksQuery::data($userId);


        return view('profile.show', compact('profile', 'user', 'links'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);



        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // request value is 'body', not 'description' to accommodate ckeditor

        $this->validate($request, [

            'name' => 'required|string|max:100|unique:contents,name,' .$id,
            'is_contributor' => 'required|boolean',
            'body' => 'required|string|max:100000',
            'image' => 'max:1000',


        ]);

        $profile = Profile::findOrFail($id);

        $slug = Str::slug($request->name, "-");

        $this->setUpdatedModelValues($request, $profile, $slug);

        // if file, we have additional requirements before saving

        if ($this->newFileIsUploaded()) {

            $this->deleteExistingImages($profile);

            $this->setNewFileExtension($request, $profile);

        }

        $profile->save();


        // check for file, if new file, overwrite existing file

        if ($this->newFileIsUploaded()){

            $file = $this->getUploadedFile();

            $this->saveImageFiles($file, $profile);

        }



        return Redirect::route('profile.show', ['profile' => $profile, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $content = Profile::findOrFail($id);

        $this->deleteExistingImages($content);

        Profile::destroy($id);

        return Redirect::route('profile.index');

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
        $modelInstance->is_contributor = $request->get('is_contributor');
        $modelInstance->contributor_status = $request->get('contributor_status');
        $modelInstance->description = $request->get('body');
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }
}