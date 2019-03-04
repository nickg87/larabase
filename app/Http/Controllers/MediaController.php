<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // create a variable and store all the pages in it from the databae
        //$pages = Page::orderBy('id','desc')->paginate(10);
        return view('admin.media.index');
        // return view and pass int the above variable
    }
}
