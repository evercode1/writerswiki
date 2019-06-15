<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Http\AuthTraits\OwnsRecord;
use App\Rules\MaxLinkRecords;
use Illuminate\Http\Request;
use App\Queries\ProfileLinksQuery;
use Illuminate\Support\Facades\Auth;
use App\ContributorLink;
use App\ContributorLinkType;
use Illuminate\Support\Facades\Redirect;
use App\Rules\MustHaveProfile;

class ManageLinksController extends Controller
{
    use OwnsRecord;

    public function __construct()
    {

        $this->middleware(['auth']);

    }


    public function index()
    {


        $links = ProfileLinksQuery::data(Auth::id());

        return view('manage-links.index', compact('links'));


    }

    public function create()
    {

        $contributorLinkTypes = ContributorLinkType::orderBy('name', 'asc')->get();

        return view('manage-links.create', compact('contributorLinkTypes'));

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
            'count' => new MaxLinkRecords(Auth::id()),
            'contributor_link_type_id' => "required|numeric"

        ]);

        $contributorLink = ContributorLink::create(['name' => $request->name,
                                                    'url' => $request->url,
                                                    'user_id' => Auth::id(),
                                                    'contributor_link_type_id'  => $request->contributor_link_type_id]);
        $contributorLink->save();

        return Redirect::route('manage-links.index');

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

        return view('manage-links.edit', compact('contributorLink', 'contributorLinkTypes', 'oldValue', 'oldId'));
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

        if( $this->userNotOwnerOf($contributorLink)  )  {

            throw new UnauthorizedException();

        }

        $contributorLink->update(['name' => $request->name,
                                  'url' => $request->url,
                                  'user_id' => Auth::id(),
                                  'contributor_link_type_id'  => $request->contributor_link_type_id]);




        return Redirect::route('manage-links.index');

    }


    public function destroy($id)
    {

        $contributorLink = ContributorLink::findOrFail($id);

        if( $this->userNotOwnerOf($contributorLink)  )  {

            throw new UnauthorizedException();

        }

        ContributorLink::destroy($id);



        return Redirect::route('manage-links.index');

    }


}
