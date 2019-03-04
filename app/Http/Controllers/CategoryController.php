<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all our category
        // it will also hace a form to create a new category // deci nu mai e nevoie de create()
        $categories = Category::all();
        return view('admin.category.index')->withCategories($categories);
    }

    public function indexApi()
    {
        $categories = Category::all();
        return $categories->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save a new category --> redirect to category index
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'slug'  =>'required|alpha_dash|min:5|max:255|unique:category|unique:page'
        ));
        // store in the database
        $category = new Category;
        $category->name         = $request->name;
        $category->slug         = $request->slug;
        $category->description  = $request->description;
        $category->save();
        Session::flash('success','The category was successfully saved!');
        // redirect to another page
        return redirect()->route('admin.category.index');
    }


    public function storeApi(Request $request)
    {
        // validate
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
        ]);
        // store in the database a new category
        $category = new Category;
        $category->name    = $request->name;
        $category->description    = $request->description;
        $category->save();
        // return task with user object
        return response()->json($category->find($category->id));
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
        // find the category in the database and save as a var
        $catEdit = Category::find($id);
        return view('admin.category.edit')->with('catEdit',$catEdit);
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
       //echo $id; dd();
        $category = Category::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255',
            'slug'  =>'required|alpha_dash|min:5|max:255|unique:page|unique:category,slug,' . $id,
        ));
        // save in the database
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->save();

        Session::flash('success', 'The category was successfully updated!');
        // redirect to another page
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::where('id','=',$id)->withCount('pages')->first();
        //dd($category);
        if ($category->pages_count>0){
            Session::flash('error','You have '.$category->pages_count.' post(s) assigned to this category!');
            return redirect()->route('admin.category.index');
        } else {
        $category->delete();
        Session::flash('success','The category was successfully deleted!');
        return redirect()->route('admin.category.index');
        }

    }
}
