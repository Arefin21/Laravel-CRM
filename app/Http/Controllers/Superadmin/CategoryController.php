<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('superadmin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validate with custom message for unique rule
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ], [
            'name.unique' => 'Category Name already exists.'
        ]);

        // Create a new category if validation passes
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        // Redirect with a success message
        return redirect()->route('category.index')->with('successMsg', 'Category Successfully Saved');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =   Category::find($id);
        return view('superadmin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate with unique rule, but exclude the current category being updated
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $id,
        ], [
            'name.unique' => 'Category Name already exists.'
        ]);

        // Find the category and update its name
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        // Redirect with success message
        return redirect()->route('category.index')->with('successMsg', 'Category Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorylist = Category::find($id);
        $categorylist->delete();
        return redirect()->back()->with('dangerMsg','Catgegory Successfully Deleted');
    }
}
