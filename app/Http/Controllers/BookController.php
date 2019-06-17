<?php

namespace App\Http\Controllers;

use App\Rules\MustBelongToCategory;
use App\Rules\MustHaveValueGreaterThanZero;
use App\UtilityTraits\CategoryTrait;
use App\UtilityTraits\KebabHelper;
use App\UtilityTraits\ManagesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Subcategory;
use App\User;

class BookController extends Controller
{
    use ManagesImages, KebabHelper, CategoryTrait;

    public function __construct()
    {

        $this->middleware(['auth'], ['except' => 'index', 'show']);

        $this->middleware(['contributor'], ['except' => 'show']);

        $this->setImageDefaultsFromConfig('book');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('book.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        list($categories, $subcategories) = $this->getCategoryLists();


           return view('book.create', compact('categories', 'subcategories'));

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
                    'url' => 'required|url|unique:books',
                    'category' => 'required|integer',
                    'subcategory' => ['required','integer', new MustHaveValueGreaterThanZero()],
                    'is_active' => 'required|boolean',
                    'body' => 'required|string|max:1000',


                ]);


        $slug = Str::slug($request->name, "-");


        $book = Book::create([ 'name' => $request->name,
                               'author' => $request->author,
                               'url' => $request->url,
                               'category_id' => $request->category,
                               'subcategory_id' => $request->subcategory,
                               'user_id' => Auth::id(),
                                'slug' => $slug,
                                'is_active' => $request->is_active,
                                'description' => $request->body]);

        $book->save();


        return Redirect::route('book.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $book = Book::findOrFail($id);

        $contributor = User::where('id', $book->user_id)->first();

        $contributor = $contributor->profiles->name;

        $category = $this->showCategoryName($book->category_id);

        $subcategory = $this->showSubcategoryName($book->subcategory_id);


        return view('book.show', compact('book', 'category', 'subcategory', 'contributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $book = Book::findOrFail($id);

        $oldcategory = Category::where('id', $book->category_id)->first();

        $oldsubcategory = Subcategory::where('id', $book->subcategory_id)->first();





        return view('book.edit', compact('book', 'oldcategory', 'oldsubcategory'));

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

            'name' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'url' => 'required|url|unique:books,name,' .$id,
            'category' => 'required|integer',
            'subcategory' => ['required','integer', new MustHaveValueGreaterThanZero(),
                                                    new MustBelongToCategory($request->category)],
            'is_active' => 'required|boolean',
            'body' => 'required|string|max:1000',



            ]);

        $book = Book::findOrFail($id);

        $slug = Str::slug($request->name, "-");

        $this->setUpdatedModelValues($request, $book, $slug);

        $book->save();

        return Redirect::route('book.show', ['book' => $book, $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $book = Book::findOrFail($id);

        $this->deleteExistingImages($book);

        Book::destroy($id);

        return Redirect::route('book.index');

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
        $modelInstance->author = $request->get('author');
        $modelInstance->url = $request->get('url');
        $modelInstance->category_id = $request->get('category');
        $modelInstance->subcategory_id = $request->get('subcategory');
        $modelInstance->slug = $slug;
        $modelInstance->is_active = $request->get('is_active');
        $modelInstance->description = $request->get('body');

    }

}