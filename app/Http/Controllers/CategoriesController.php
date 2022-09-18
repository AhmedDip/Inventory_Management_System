<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitleRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $categories = Category::all();

        return view('Categories.category',['category'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $save = $category->save();

        if($save)
        {
          Session::flash('create', 'Category Created Successfully');
        }        
          return redirect()-> to(route('categories.store'));
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
        $categories = Category::findorFail($id);
        return view('Categories.edit',["category"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TitleRequest $request, $id)
    {
        $id = $request->id;

        $category = Category::find($id);
        $category->title = $request->title;
        $save=  $category->save();
        if($save)
        {
          Session::flash('create', 'Category Updated Successfully');
        }    
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Category::find($id)->delete();
        if($destroy)
        {
          Session::flash('delete', 'Category Deleted Successsfully');
        }
        return redirect()->to(route('categories.index'));
    }
}
