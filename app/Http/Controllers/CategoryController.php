<?php

namespace App\Http\Controllers;

use App\Category;
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
        $data = Category::paginate(5);
        return view('category.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|unique:categories|max:255',
            'description'=>'required'
        ]);

        $category = Category::create($request->all());

        return redirect(route('categories.show', ['category'=>$category]));
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = $category->posts()->paginate(10);
        return \view('category.single', compact('data'))->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return \view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            //All names should be unique exept this one
            'name'=>"required|max:255|unique:categories,name,{$category->id}",
            'description'=>'required'
        ]);
        $category->update($request->all());
        return redirect(route('categories.show', ['category'=>$category]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
