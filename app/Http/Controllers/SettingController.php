<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
use Purifier;
use Response;
use Cache;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // validate the data
        /*$this->validate($request, array(
            'name' => 'required|min:5|max:255',
            'title' => 'required|min:5|max:255'
        ));

        // store in the database
        $page = new Setting;
        $page->name                 = $request->name;
        $page->title                = $request->title;
        $page->about                = $request->about;
        $page->description          = $request->description;
        $page->keywords             = $request->keywords;
        $page->head_scripts         = $request->head_scripts;
        $page->foot_scripts         = Purifier::clean($request->foot_scripts);
        $page->google_maps          = $request->google_maps;
        $page->save();
        Session::flash('success','The settings were successfully saved!');
        return view('admin.setting.index');*/
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
        // validate the data
        $page = Setting::find($id);
        $this->validate($request, array(
            'name' => 'required|min:5|max:255',
            'title' => 'required|min:5|max:255'
        ));
        // update in the database
        $page->name                 = $request->name;
        $page->title                = $request->title;
        $page->about                = Purifier::clean($request->about);
        $page->description          = Purifier::clean($request->description);
        $page->keywords             = $request->keywords;
        $page->head_scripts         = $request->head_scripts;
        $page->foot_scripts         = $request->foot_scripts;
        $page->google_maps          = $request->google_maps;
        $page->phone                = $request->phone;
        $page->email                = $request->email;
        $page->save();
        Session::flash('success','The settings were Successfully saved!');
        return back();
        /*view('admin.setting.index');*/
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
    }
}
