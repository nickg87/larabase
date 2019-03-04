<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Session;
use Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use Redirect;

class TestimonialController extends Controller
{
    private $testimonials_path;
    public function __construct()
    {
        $this->testimonials_path = public_path('/images/testimonials');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all our category
        // it will also hace a form to create a new category // deci nu mai e nevoie de create()
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index')->withTestimonials($testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!is_dir($this->testimonials_path)) { mkdir($this->testimonials_path, 0777); }
        // save a new category --> redirect to category index
        // validate the data
        $this->validate($request, array(
            'from' => 'required|max:255',
            'text'  =>'required'
        ));
        // store in the database
        $testimonial = new Testimonial;
        $testimonial->from         = $request->from;
        $testimonial->text         = $request->text;
        $testimonial->save();

        if ($request->hasFile('image')) {
            // add the new image
            $image      = $request->file('image');
            $filename   = 'testimonial-'. $testimonial->id . '.' . $image->getClientOriginalExtension();
            $small   = 'small-testimonial-'. $testimonial->id . '.' . $image->getClientOriginalExtension();
            $location   = public_path('images/testimonials/'.$filename);
            $locationsm   = public_path('images/testimonials/'.$small);
            //Image::make($image)->resize(100,null,function($constraint){$constraint->aspectRatio();})->fit(100)->save($location);
            Image::make($image)->fit(500)->save($location);
            Image::make($image)->fit(100)->save($locationsm);
            //update the new image
            $testimonial->update(['image' => $filename]);
        }


        Session::flash('success','The testimonial was successfully saved!');
        // redirect to another page
        return redirect()->route('admin.testimonial.index');
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
        //
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
        //
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
        $item = Testimonial::find($id);
        if (is_file('images/testimonials/'.$item->image)) unlink(public_path('images/testimonials/'.$item->image));
        if (is_file('images/testimonials/small-'.$item->image)) unlink(public_path('images/testimonials/small-'.$item->image));
        $item->delete();
        Session::flash('success','Testimonial successfully deleted!');
        return redirect()->route('admin.testimonial.index');
    }
}
