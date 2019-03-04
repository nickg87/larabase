<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save a new tag --> redirect to tag index
        // validate the data
        $this->validate($request, array(
            'name' => 'required|min:2|max:255|unique:tag',
        ));
        // store in the database
        $tag = new Tag;
        $tag->name    = $request->name;
        $tag->save();
        Session::flash('success','The tag was successfully saved!');
        // redirect to another page
        return redirect()->route('admin.tag.index');
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
    public function create()
    {
        //
        return view('admin.tag.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
        $tagEdit = Tag::find($id);
        $tags = Tag::all();
        // return the view and pass in the var we previously created
        return view('admin.tag.edit')->with('tagEdit',$tagEdit)->withTags($tags);
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
        $tag = Tag::find($id);
        $this->validate($request, array(
             'name' => 'required|min:2|max:255|unique:tag,name,' . $id,
        ));
        // save in the database
        $tag->name = $request->input('name');
        $tag->save();

        Session::flash('success', 'The tag was successfully updated!');
        $tags = Tag::all();
        // redirect to another page
        return redirect()->route('admin.tag.index')->withTags($tags);
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
        $tag = Tag::find($id);
        $tag->pages()->detach();
        $tag->delete();
        Session::flash('success','The tag was successfully deleted!');
        return redirect()->route('admin.tag.index');
    }
}
