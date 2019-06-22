<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Description;
use App\Http\AuthTraits\OwnsRecord;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class DescriptionController extends Controller
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

        return view('description.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('description.create');

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

        $slug = $this->slug($request);

        $description = Description::create([ 'name' => $request->name,
                                             'slug' => $slug,
                                             'user_id' => Auth::id(),
                                             'is_active' => $request->is_active]);

        $description->save();


        return Redirect::route('description.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $description = Description::findOrFail($id);

        return view('description.show', compact('description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $description = Description::findOrFail($id);

        if( ! $this->adminOrContributorOwns($description)){

            throw new UnauthorizedException();

        }

        return view('description.edit', compact('description'));

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

            'name' => 'required|string|max:100|unique:descriptions,name,' .$id,
            'is_active' => 'required|boolean'

        ]);

        $description = Description::findOrFail($id);

        if( ! $this->adminOrContributorOwns($description)){

            throw new UnauthorizedException();

        }

        $slug = $this->slug($request);

        $this->setUpdatedModelValues($request, $description, $slug);

        $description->save();


        return Redirect::route('description.show', ['description' => $description, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $description = Description::findOrFail($id);

        if( ! $this->adminOrContributorOwns($description)){

            throw new UnauthorizedException();

        }


        Description::destroy($id);

        return Redirect::route('description.index');

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

    /**
     * @param Request $request
     * @return string
     */
    private function slug(Request $request)
    {
        $slug = 'how-to-describe-' . Str::slug($request->name, "-") . '-in-writing';

        return $slug;
    }

}