<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Expression;
use App\Emotion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class ExpressionController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth']);

        $this->middleware(['admin'], ['except' => 'create','show']);




    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('expression.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {



        $emotions = Emotion::orderBy('name', 'asc')->get();


        return view('expression.create', compact('emotions'));

    }

    public function createPreset($type)
    {



        $emotion = Emotion::where('id', $type)->first();


        return view('expression.create-preset', compact('emotion'));

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

                    'label' => 'required|unique:expressions|string|max:40',
                    'is_active' => 'required|boolean',
                    'emotion_id' => 'required|integer',
                    'body'=> 'required|string'

                ]);


        $slug = $this->slug($request);


        $expression = Expression::create([ 'label' => $request->label,
                                           'slug' => $slug,
                                           'user_id' => Auth::id(),
                                           'emotion_id' => $request->emotion_id,
                                           'is_active' => $request->is_active,
                                           'description' => $request->body]);

        $expression->save();


        return Redirect::route('emotion-expression.index', ['type' => $expression->emotion_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $expression = Expression::findOrFail($id);

        $user = User::where('id', $expression->user_id)->first();

        $userid = $user->id;
        $username = $user->profiles->name;
        $profile = $user->profiles->id;
        $thumb = $user->profileThumb();
        $tagline = $user->profiles->tagline;

        $emotion = $expression->emotion->name;
        $emotionId = $expression->emotion->id;

        return view('expression.show', compact('expression', 'emotion', 'username', 'emotionId',
                                               'profile', 'thumb', 'tagline', 'userid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $expression = Expression::findOrFail($id);

        $emotions = Emotion::where('is_active', 1)->orderBy('name', 'asc')->get();


        return view('expression.edit', compact('expression', 'emotions'));

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

            'label' => 'required|string|max:40|unique:expressions,label,' .$id,
            'is_active' => 'required|boolean',
            'emotion_id' => 'required|integer',
            'body'=> 'required|string'

            ]);

        $expression = Expression::findOrFail($id);

        $slug = $this->slug($request);

        $this->setUpdatedModelValues($request, $expression, $slug);


        $expression->save();


        return Redirect::route('expression.show', ['expression' => $expression, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {


        Expression::destroy($id);

        return Redirect::route('expression.index');

    }

        /**
         * @param EditImageRequest $request
         * @param $marketingImage
         */

    private function setUpdatedModelValues(Request $request, $modelInstance, $slug)
    {

        $modelInstance->label = $request->get('label');
        $modelInstance->slug = $slug;
        $modelInstance->emotion_id = $request->get('emotion_id');
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');


    }

    /**
     * @param Request $request
     * @return string
     */
    private function slug(Request $request)
    {
        $emotion = DB::table('emotions')->where('id', $request->emotion_id)->value('name');

        $emotion = strtolower($emotion);

        $slug = 'How-to-describe-' . $emotion . '-in-writing-with-' . Str::slug($request->label, "-");

        return $slug;
    }

}