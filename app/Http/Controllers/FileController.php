<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUp;
use App\Page;
use Response;
use Storage;
use Session;
use Auth;

class FileController extends Controller
{
    private $file_path;
    public function __construct()
    {
        $this->file_path = public_path('/files');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the pages in it from the databae
        $files = FileUp::orderBy('id','desc')->paginate(10);
        return view('admin.media.file.index')->withFiles($files);
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
        return view('admin.media.file.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('file');
        if ($request->input('page_id')) $pageId = $request->input('page_id');

        if (!is_array($files)) {
            $files = [$files];
        }

        if (!is_dir($this->file_path)) { mkdir($this->file_path, 0777); }
        if (!Auth::user()->isUser()) {
            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                if (!empty($file)) {
                    $name = sha1(date('YmdHis') . str_random(30));
                    $save_name = $name . '.' . $file->getClientOriginalExtension();

                    $file->move($this->file_path, $save_name);

                    $upload = new FileUp();
                    $upload->file = $save_name;
                    $upload->original_name = basename($file->getClientOriginalName());
                    $upload->save();
                    if (!empty($pageId)) {
                        $page = Page::find($pageId);
                        $ord = $page->files()->count() + 1;
                        $upload->pages()->attach($pageId, ['ord' => $ord]);
                    }
                }

            }
            return Response::json([
                'message' => 'File saved Successfully'
            ], 200);
        } else {
            return Response::json([
                'error' => 'You don\'t have acces to this feature!'
            ], 200);
        }
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
        //$image = ImageUp::find($request->id);
        $filename = $request->id;
        dump($filename);
        $file = FileUp::where('original_name', basename($filename))->first();
        if (empty($file)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
        $file_path = $this->file_path . '/' . $file->file;
        if (file_exists($file_path)) { unlink($file_path); }

        if (!empty($file)) { $file->delete(); }
        return Response::json(['message' => 'File successfully delete'], 200);

    }

    public function destroy($id)
    {
        //
        $file = FileUp::find($id);
        if (!empty($file))
        {
            $file_path = $this->file_path . '/' . $file->file;
            if (file_exists($file_path)) { unlink($file_path); }
            $file->delete();
        }
        Session::flash('success','The file was successfully deleted!');
        return redirect()->route('admin.file.index');
    }
}
