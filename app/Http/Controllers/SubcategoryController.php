<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('subcategory.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

       $categories = Category::orderBy('name', 'asc')->get();

        return view('subcategory.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

       $count = Category::count();

       $this->validate($request, [
            'name' => 'required|unique:subcategories|string|max:30',
            'category_id' => "required|numeric|digits_between:1,$count",
            'is_active' => 'required|boolean'

        ]);

        $subcategory = Subcategory::create(['name' => $request->name,
                                            'category_id'  => $request->category_id,
                                            'is_active' => $request->is_active]);
        $subcategory->save();

        return Redirect::route('subcategory.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $category = $subcategory->category->name;

        return view('subcategory.show', compact('subcategory', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $categories = Category::orderBy('name', 'asc')->get();

        $oldName = $subcategory->category->name;

        $oldId = $subcategory->category->id;

        return view('subcategory.edit', compact('subcategory', 'categories', 'oldName', 'oldId'));
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

        $count = Category::count();

        $this->validate($request, [

            'name' => 'required|string|max:40|unique:subcategories,name,' .$id,
            'category_id' => "required|numeric|digits_between:1,$count",
            'is_active' => 'required|boolean'

        ]);

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update(['name' => $request->name,
                              'category_id'  => $request->category_id,
                              'is_active' => $request->is_active
                              ]);



        return Redirect::route('subcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Subcategory::destroy($id);

        return Redirect::route('subcategory.index');

    }
}