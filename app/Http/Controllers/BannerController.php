<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Page;
use Response;
use Image;
use Storage;
use Session;
use Auth;

class BannerController extends Controller
{

    private $photos_path_original;
    private $photos_path_thumb;
    public function __construct()
    {
        $this->photos_path_original = public_path('/images/original');
        $this->photos_path_thumb = public_path('/images/thumb');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // create a variable and store all the pages in it from the databae
        //$pages = Page::orderBy('id','desc')->paginate(10);
        $images = Banner::orderBy('id','desc')->paginate(10);
        #dd($images);
        if ($request->ajax()) {
            return view('admin.media.banner.presult', compact('images'));
        }

        return view('admin.media.banner.index',compact('images'));
        // return view and pass int the above variable
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.banner.index');
    }
    public function edit($id)
    {
        // find the category in the database and save as a var
        $banner = Banner::find($id);
        return view('admin.media.banner.edit')->with('banner',$banner);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photos = $request->file('file');
        #dd($pageId);
        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path_original)) { mkdir($this->photos_path_original, 0777); }
        if (!is_dir($this->photos_path_thumb)) { mkdir($this->photos_path_thumb, 0777); }
        if (!Auth::user()->isUser()) {
            for ($i = 0; $i < count($photos); $i++) {
                $photo = $photos[$i];
                if (!empty($photo)) {
                    $name = sha1(date('YmdHis') . str_random(30));
                    $save_name = $name . '.' . $photo->getClientOriginalExtension();
                    //create original
                    $img = Image::make($photo);
                    $img->save($this->photos_path_original . '/' . $save_name);
                    //create thumnb
                    $img = Image::make($photo);
                    $img->resize(180, null, function ($constraints) {
                        $constraints->aspectRatio();
                    })->save($this->photos_path_thumb . '/' . $save_name);
                    $upload = new Banner();
                    $upload->image = $save_name;
                    $upload->original_name = basename($photo->getClientOriginalName());
                    $upload->save();
                }

            }

            return Response::json([
                'message' => 'Banner saved Successfully'
            ], 200);
        } else {
            return Response::json([
                'error' => 'You don\'t have acces to this feature!'
            ], 200);
        }
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
        $banner = Banner::find($id);
        // save in the database
        $banner->title        = $request->title;
        $banner->small         = $request->small;
        $banner->button         = $request->button;
        $banner->link         = $request->link;
        $banner->save();

        Session::flash('success', 'The banner was successfully updated!');
        // redirect to another page
        return redirect()->route('admin.banner.index');
    }

    public function show($id)
    {
        //
        $page = Banner::find($id);
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDropZone(Request $request)
    {
        //
        //$image = Banner::find($request->id);
        $filename = $request->id;
        dump($filename);
        $image = Banner::where('original_name', basename($filename))->first();
        if (empty($image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
        $file_path_original = $this->photos_path_original . '/' . $image->image;
        $file_path_thumb = $this->photos_path_thumb . '/' . $image->image;

        if (file_exists($file_path_original)) { unlink($file_path_original); }
        if (file_exists($file_path_thumb)) { unlink($file_path_thumb); }

        if (!empty($image)) { $image->delete(); }
        return Response::json(['message' => 'Banner successfully delete'], 200);

    }

    public function destroy($id)
    {
        //
        $image = Banner::find($id);
        if (!empty($image))
        {
        $file_path_original = $this->photos_path_original . '/' . $image->image;
        $file_path_thumb = $this->photos_path_thumb . '/' . $image->image;
        if (file_exists($file_path_original)) { unlink($file_path_original); }
        if (file_exists($file_path_thumb)) { unlink($file_path_thumb); }
        $image->delete();
        }
        Session::flash('success','The banner was successfully deleted!');
        return back();
        #redirect()->route('admin.image.index');
    }
}
