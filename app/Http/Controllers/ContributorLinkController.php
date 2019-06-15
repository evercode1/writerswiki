<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContributorLink;
use App\ContributorLinkType;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Rules\MustHaveProfile;
class ContributorLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('contributor-link.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

       $contributorLinkTypes = ContributorLinkType::orderBy('name', 'asc')->get();

        return view('contributor-link.create', compact('contributorLinkTypes'));

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
            'name' => 'required|unique:contributor_links|string|max:100',
            'url' => 'required|url|max:300',
            'user' => new MustHaveProfile(),
            'contributor_link_type_id' => "required|numeric"

        ]);

        $contributorLink = ContributorLink::create(['name' => $request->name,
                                                    'url' => $request->url,
                                                    'user_id' => Auth::id(),
                                                    'contributor_link_type_id'  => $request->contributor_link_type_id]);
        $contributorLink->save();

        return Redirect::route('contributor-link.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $contributorLink = ContributorLink::findOrFail($id);

        $contributorLinkType = $contributorLink->contributorLinkType->name;

        return view('contributor-link.show', compact('contributorLink', 'contributorLinkType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $contributorLink = ContributorLink::findOrFail($id);

        $contributorLinkTypes = ContributorLinkType::orderBy('name', 'asc')->get();

        $oldValue = $contributorLink->contributorLinkType->name;

        $oldId = $contributorLink->contributorLinkType->id;

        return view('contributor-link.edit', compact('contributorLink', 'contributorLinkTypes', 'oldValue', 'oldId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {


        $this->validate($request, [

            'name' => 'required|string|max:40|unique:contributor_links,name,' .$id,
            'url' => 'required|url|max:300',
            'contributor_link_type_id' => "required|numeric"

        ]);

        $contributorLink = ContributorLink::findOrFail($id);

        $contributorLink->update(['name' => $request->name,
                                  'url' => $request->url,
                                  'user_id' => Auth::id(),
                                  'contributor_link_type_id'  => $request->contributor_link_type_id]);

        $contributorLinkType = $contributorLink->contributorLinkType->name;


        return Redirect::route('contributor-link.show', ['contributorLink' => $contributorLink,
                                                        'contributorLinkType' => $contributorLinkType
                                                        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        ContributorLink::destroy($id);

        return Redirect::route('contributor-link.index');

    }
}