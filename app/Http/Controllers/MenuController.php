<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $zones = [ 0 => 'Header', 1 => 'Footer box', 2 => 'Footer nav' ];

    public function index()
    {
        //
        //$menus = Menu::getMenuTree();
        //dd($menus);
        $menusHeader = Menu::getMenuZoneTree(0);
        $menusFooter = Menu::getMenuZoneTree(1);
        $menusFooterNav = Menu::getMenuZoneTree(2);
        return view('admin.menu.index')->withMenusHeader($menusHeader)->withMenusFooter($menusFooter)->withMenusFooterNav($menusFooterNav);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = Menu::getMenuTree();
        $zones = $this->zones;
        #dd($menus);
        return view('admin.menu.create')->withMenus($menus)->withZones($zones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'link' => 'required|max:255',
            'title' => 'required|max:255',
            'slug'  =>'required|alpha_dash|min:5|max:255|unique:menu|unique:category|unique:page'
        ));
        // store in the database
        $menu = new Menu;
        $menu->link         = $request->link;
        $menu->title        = $request->title;
        $menu->slug         = $request->slug;
        $menu->parent_id    = $request->parent_id;
        $menu->zone_id      = $request->zone_id;
        $menu->description  = $request->description;
        $menu->save();
        Session::flash('success','The menu was successfully saved!');
        // redirect to another page
        return redirect()->route('admin.menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $meniu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $meniu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plucked=array();
        $menuEdit = Menu::find($id);
        $menus = Menu::getMenuTree();
        $zones = $this->zones;
        return view('admin.menu.edit')->with('menuEdit',$menuEdit)->withMenus($menus)->withZones($zones);
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
        $menu = Menu::find($id);
        $this->validate($request, array(
            'link' => 'required|max:255',
            'title' => 'required|max:255',
            'slug'  =>'required|alpha_dash|min:5|max:255|unique:page|unique:category|unique:menu,slug,' . $id,
        ));
        // save in the database
        $menu->link         = $request->link;
        $menu->title        = $request->title;
        $menu->slug         = $request->slug;
        $menu->parent_id    = $request->parent_id;
        $menu->zone_id      = $request->zone_id;
        $menu->description  = $request->description;
        $menu->save();

        Session::flash('success', 'The menu was successfully updated!');
        // redirect to another page
        return redirect()->route('admin.menu.index');
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
        $menu = Menu::find($id);
        $menu->delete();
        Session::flash('success','The menu was successfully deleted!');
        return redirect()->route('admin.menu.index');
    }
}
