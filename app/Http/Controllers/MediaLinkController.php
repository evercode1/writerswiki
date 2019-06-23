<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\MediaLink;
use App\MediaLinkType;
use App\Category;
use App\Subcategory;
use App\Rules\MustHaveValueGreaterThanZero;
use Illuminate\Support\Facades\Auth;

class MediaLinkController extends Controller
{

    use OwnsRecord;

    public function __construct()
    {

        $this->middleware(['auth'], ['except' => 'show']);

        $this->middleware(['contributor'], ['only' => 'create', 'edit', 'update']);

        $this->middleware(['admin'], ['only' => 'destroy']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('media-link.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        if( ! Auth::user()->isContributor()){

            throw new UnauthorizedException();

        }

           $types = MediaLinkType::where('is_active', 1)->pluck('name', 'id');



           return view('media-link.create', compact('types'));

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

                    'name' => 'required|string|max:100',
                    'author' => 'required|string|max:100',
                    'url' => 'required|url|unique:media_links',
                    'type' => 'required|integer',
                    'category' => 'required|integer',
                    'subcategory' => ['required','integer', new MustHaveValueGreaterThanZero()],
                    'is_active' => 'required|boolean',




                ]);

        if( ! Auth::user()->isContributor()){

            throw new UnauthorizedException();

        }




        $mediaLink = MediaLink::create([ 'name' => $request->name,
                                         'author' => $request->author,
                                         'url' => $request->url,
                                         'media_link_type_id' => $request->type,
                                         'category_id' => $request->category,
                                         'subcategory_id' => $request->subcategory,
                                         'user_id' => Auth::id(),
                                         'is_active' => $request->is_active
                                       ]);

        $mediaLink->save();


        $type =  MediaLinkType::where('id', $mediaLink->media_link_type_id)->first();

        $type = $type->name;

        return Redirect::route('all-media', ['type' => $type]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $mediaLink = MediaLink::findOrFail($id);

        if( ! $this->adminOrContributorOwns($mediaLink)){

           throw new UnauthorizedException();

        }

        $types = MediaLinkType::where('is_active', 1)->pluck('name', 'id');

        $oldType = MediaLinkType::where('id', $mediaLink->media_link_type_id)->first();

        $oldcategory = Category::where('id', $mediaLink->category_id)->first();

        $oldsubcategory = Subcategory::where('id', $mediaLink->subcategory_id)->first();


        return view('media-link.edit', compact('mediaLink', 'types', 'oldType', 'oldcategory', 'oldsubcategory'));

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

            'name' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'url' => 'required|url|unique:media_links,url,' .$id,
            'type' => 'required|integer',
            'category' => 'required|integer',
            'subcategory' => ['required','integer', new MustHaveValueGreaterThanZero()],
            'is_active' => 'required|boolean'


            ]);

        $mediaLink = MediaLink::findOrFail($id);


        $this->setUpdatedModelValues($request, $mediaLink);



        $mediaLink->save();



        return Redirect::route('media-link.edit', ['mediaLink' => $mediaLink]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        MediaLink::destroy($id);

        return Redirect::route('media-link.index');

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->author = $request->get('author');
        $modelInstance->url = $request->get('url');
        $modelInstance->media_link_type_id = $request->get('type');
        $modelInstance->category_id = $request->get('category');
        $modelInstance->subcategory_id = $request->get('subcategory');
        $modelInstance->is_active = $request->get('is_active');



    }

}