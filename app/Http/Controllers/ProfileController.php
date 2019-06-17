<?php

namespace App\Http\Controllers;

use App\Queries\ProfileLinksQuery;
use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Redirect;
use App\UtilityTraits\ManagesImages;
use Illuminate\Support\Str;
use App\UtilityTraits\KebabHelper;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Exceptions\UnauthorizedException;
use App\User;
use App\Http\AuthTraits\OwnsRecord;

class ProfileController extends Controller
{
    use OwnsRecord, ManagesImages, KebabHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin',['only'=> 'index']);

        $this->setImageDefaultsFromConfig('profile');


    }

    public function index()
    {

        return view('profile.index');

    }

    public function determineProfileRoute()
    {

        if ($this->profileExists()){

            return Redirect::route('show-profile');

        }

        return view('profile.create');

    }

    public function showProfileToUser()
    {
        $profile = Profile::where('user_id', Auth::id())->first();

        if( ! $profile){

            return Redirect::route('profile.create');

        }


        if ($this->userNotOwnerOf($profile)){

            throw new UnauthorizedException;

        }

        $user = $profile->user->name;
        $userId = $profile->user->id;

        $links = ProfileLinksQuery::data($userId);

        return view('profile.show', compact('profile', 'user', 'links'));

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

           'name' => 'required|unique:profiles|string|max:100',
           'body' => 'required|string|max:100000',
           'tagline' => 'required|string|max:50',
           'image' => 'max:1000',


        ]);

        $slug = Str::slug($request->name, "-");


        $profile = Profile::create(['name' => $request->name,
                                    'description' => $request->body,
                                    'tagline' => $request->tagline,
                                    'slug' => $slug,
                                    'user_id'  => Auth::id(),
                                    'image_name'        => $this->formatString($request->get('name')),
                                    'image_extension'   => $request->file('image')->getClientOriginalExtension()]);



        $profile->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $profile);

        $user = $profile->user->name;
        $userId = $profile->user->id;

        $links = ProfileLinksQuery::data($userId);

        return Redirect::route('profile.show', ['profile' => $profile, 'user' => $user, 'links' => $links]);

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

        if (! $this->adminOrCurrentUserOwns($profile)){

            throw new UnauthorizedException;

        }

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

            'name' => 'required|string|max:100|unique:profiles,name,' .$id,
            'body' => 'required|string|max:100000',
            'tagline' => 'required|string|max:50',
            'image' => 'max:1000',


        ]);

        $profile = Profile::findOrFail($id);

        if (! $this->adminOrCurrentUserOwns($profile)){

            throw new UnauthorizedException;

        }

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

        $profile = Profile::findOrFail($id);

        if (! $this->adminOrCurrentUserOwns($profile)){

            throw new UnauthorizedException;

        }

        $this->deleteExistingImages($profile);

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
        $modelInstance->description = $request->get('body');
        $modelInstance->tagline = $request->tagline;
        $modelInstance->image_name = $this->formatString($request->get('name'));

    }

    /**
     * @return mixed
     */

    private function profileExists()
    {
        $profileExists = DB::table('profiles')
                         ->where('user_id', Auth::id())
                         ->exists();

        return $profileExists;

    }
}