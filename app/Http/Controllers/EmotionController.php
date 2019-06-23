<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Emotion;
use Illuminate\Support\Facades\Auth;


class EmotionController extends Controller
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

        return view('emotion.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {



           return view('emotion.create');

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
                    'is_active' => 'required|boolean',
                    'definition' => 'string|max:400'

                ]);

         $slug = 'how-to-describe-' . Str::slug($request->name, "-") . '-in-writing';

         $emotion = Emotion::create([ 'name' => $request->name,
                                      'slug' => $slug,
                                      'user_id' => Auth::id(),
                                      'definition' => $request->definition,
                                      'is_active' => $request->is_active]);

        $emotion->save();


        return Redirect::route('emotion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $emotion = Emotion::findOrFail($id);

        return view('emotion.show', compact('emotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $emotion = Emotion::findOrFail($id);

        if( ! $this->adminOrContributorOwns($emotion)){

            throw new UnauthorizedException();

        }

        return view('emotion.edit', compact('emotion'));

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

            'name' => 'required|string|max:100|unique:emotions,name,' .$id,
            'is_active' => 'required|boolean',
            'definition' => 'string|max:400'

            ]);

        $emotion = Emotion::findOrFail($id);

        if( ! $this->adminOrContributorOwns($emotion)){

            throw new UnauthorizedException();

        }

        $slug = 'how-to-describe-' . Str::slug($request->name, "-") . '-in-writing';

        $this->setUpdatedModelValues($request, $emotion, $slug);

        $emotion->save();


        return Redirect::route('emotion.show', ['emotion' => $emotion, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $emotion = Emotion::findOrFail($id);

        if( ! $this->adminOrContributorOwns($emotion)){

            throw new UnauthorizedException();

        }


        Emotion::destroy($id);

        return Redirect::route('emotion.index');

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->name = $request->get('name');
        $modelInstance->slug = $slug;
        $modelInstance->definition = $request->definition;
        $modelInstance->is_active = $request->get('is_active');


    }

}