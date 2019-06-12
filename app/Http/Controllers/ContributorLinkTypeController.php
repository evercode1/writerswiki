<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ContributorLinkType;


class ContributorLinkTypeController extends Controller
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

        return view('contributor-link-type.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {




           return view('contributor-link-type.create');

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

                    'name' => 'required|unique:contributor_link_types|string|max:100',
                    'is_active' => 'required|boolean'


                ]);


        $contributorLinkType = ContributorLinkType::create([ 'name' => $request->name,
                                                             'is_active' => $request->is_active]);

        $contributorLinkType->save();



        return Redirect::route('contributor-link-type.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $contributorLinkType = ContributorLinkType::findOrFail($id);

        return view('contributor-link-type.show', compact('contributorLinkType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $contributorLinkType = ContributorLinkType::findOrFail($id);


        return view('contributor-link-type.edit', compact('contributorLinkType'));

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

            'name' => 'required|string|max:100|unique:contributor_link_types,name,' .$id,
            'is_active' => 'required|boolean'

            ]);

        $contributorLinkType = ContributorLinkType::findOrFail($id);



        $this->setUpdatedModelValues($request, $contributorLinkType);




        $contributorLinkType->save();



        return Redirect::route('contributor-link-type.show', ['contributorLinkType' => $contributorLinkType]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        ContributorLinkType::destroy($id);

        return Redirect::route('contributor-link-type.index');

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