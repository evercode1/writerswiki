<?php

namespace App\Http\Controllers;

use App\UtilityTraits\KebabHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\ContactTopic;


class ContactTopicController extends Controller
{
    use KebabHelper;

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

        return view('contact-topic.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {


           return view('contact-topic.create');

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

                    'name' => 'required|unique:contact_topics|string|max:100',

                ]);


        $contactTopic = ContactTopic::create([ 'name' => $request->name ]);

        $contactTopic->save();


        return Redirect::route('contact-topic.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $contactTopic = ContactTopic::findOrFail($id);

        return view('contact-topic.show', compact('contactTopic'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $contactTopic = ContactTopic::findOrFail($id);


        return view('contact-topic.edit', compact('contactTopic'));

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

            'name' => 'required|string|max:100|unique:contact_topics,name,' .$id ]);

        $contactTopic = ContactTopic::findOrFail($id);



        $this->setUpdatedModelValues($request, $contactTopic);



        $contactTopic->save();



        return Redirect::route('contact-topic.show', ['contactTopic' => $contactTopic]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $contactTopic = ContactTopic::findOrFail($id);


        ContactTopic::destroy($id);

        return Redirect::route('contact-topic.index');

    }

    private function setNewFileExtension(Request $request, $modelInstance)
    {

         $modelInstance->image_extension = $request->file('image')->getClientOriginalExtension();

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance)
    {

        $modelInstance->name = $request->get('name');


    }

}