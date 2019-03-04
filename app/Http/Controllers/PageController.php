<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\ImageUp;
use App\FileUp;
use App\Comment;
use App\Menu;
use App\Tag;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedComment;
use Session;
use Purifier;
use Image;
use Auth;
use Storage;
use Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the pages in it from the databae
        $pages = Page::orderBy('id','desc')->paginate(10);
        return view('admin.page.index')->withPages($pages);
        // return view and pass int the above variable
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery($id)
    {
        // create a variable and store all the pages in it from the databae
        // find the page in the database and save as a var
        $page = Page::find($id);
        $gallery = ImageUp::orderByDesc('id')->get();

        // return the view and pass in the var we previously created
        return view('admin.page.gallery')->with('page',$page)->withGallery($gallery);
    }

    public function orderImages(Request $request)
    {
        //
        $pageId = $request->input('page');
        $imageId = $request->input('image_id');
        $order = $request->input('sorting');
        $page = Page::find($pageId);
        // using ->attach for single message
        $page->images()->updateExistingPivot($imageId,['ord' => $order  ]);
        return Response::json(['message' => 'Order successfully updated '.$pageId.' '.$imageId.' '.$order.' '], 200);
    }

    public function deleteImage(Request $request)
    {
        //
        $pageId = $request->input('page');
        $imageId = $request->input('image_id');
        $image = ImageUp::find($imageId);
        $image->pages()->detach($pageId);
        return Response::json(['message' => 'Image unlinked successfully from page '.$pageId.' '.$imageId.' '], 200);
    }

    public function addImage(Request $request)
    {
        //
        $pageId = $request->input('page');
        $imageId = $request->input('image_id');
        $order = $request->input('sorting');
        $page = Page::find($pageId);
        $page->images()->attach($imageId, ['ord' => $order]);
        return Response::json(['message' => 'Image linked successfully for page '.$pageId.' '.$imageId.' '], 200);
    }

    public function files($id)
    {
        // create a variable and store all the pages in it from the databae
        // find the page in the database and save as a var
        $page = Page::find($id);
        $downloads = FileUp::orderByDesc('id')->get();

        // return the view and pass in the var we previously created
        return view('admin.page.files')->with('page',$page)->withDownloads($downloads);
    }

    public function orderFiles(Request $request)
    {
        //
        $pageId = $request->input('page');
        $fileId = $request->input('file_id');
        $order = $request->input('sorting');
        $page = Page::find($pageId);
        // using ->attach for single message
        $page->files()->updateExistingPivot($fileId,['ord' => $order  ]);
        return Response::json(['message' => 'Order successfully updated '], 200);
    }

    public function deleteFile(Request $request)
    {
        //
        $pageId = $request->input('page');
        $fileId = $request->input('file_id');
        $image = FileUp::find($fileId);
        $image->pages()->detach($pageId);
        return Response::json(['message' => 'File unlinked successfully from page '], 200);
    }

    public function addFile(Request $request)
    {
        //
        $pageId = $request->input('page');
        $fileId = $request->input('file_id');
        $order = $request->input('sorting');
        $page = Page::find($pageId);
        $page->files()->attach($fileId, ['ord' => $order]);
        return Response::json(['message' => 'File linked successfully for page  '], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        $categories->prepend('Pick a category', '0');
        $categories->all();
        $menus = Menu::getMenuTree();
        return view('admin.page.create')->withCategories($categories)->withMenus($menus);
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
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  =>'required|alpha_dash|min:5|max:255|unique:page|unique:menu|unique:category',
            'category_id' => 'required|integer',
            'body'  => 'required|min:10',
            'featured_image' => 'sometimes|image',
        ));

        // store in the database
        $page = new Page;
        $page->title            = $request->title;
        $page->short            = Purifier::clean($request->short);
        $page->slug             = $request->slug;
        $page->category_id      = $request->category_id;
        $page->menu_id          = $request->menu_id;
        $page->body             = Purifier::clean($request->body);

        $page->save();

        Session::flash('success','The page was successfully saved!');

        // redirect to another page
        //return redirect()->route('admin.page.edit', $page->id);
        return redirect()->route('admin.page.index');
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
        $page = Page::find($id);
        $categories = Category::pluck('name', 'id');
        $categories->all();
        $menus = Menu::getMenuTree();
        return view('admin.page.show')->with('page',$page)->withCategories($categories)->withMenus($menus);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the page in the database and save as a var
        $page = Page::find($id);
        $categories = Category::pluck('name', 'id');
        $categories->all();
        $menus = Menu::getMenuTree();
        $tags = Tag::pluck('name', 'id');
        $tags->all();
        return view('admin.page.edit')->with('page',$page)->withCategories($categories)->withMenus($menus)->withTags($tags);
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
        $page = Page::find($id);
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:category|unique:menu|unique:page,slug,' . $id,
            'category_id' => 'required|integer',
            'body' => 'required|min:10',
        ));
        // save in the database
        $page->title        = $request->input('title');
        $page->slug         = $request->input('slug');
        $page->short        = Purifier::clean($request->input('short'));
        $page->category_id  = $request->category_id;
        $page->menu_id      = $request->menu_id;
        $page->is_static    = isset($request['is_static']) ? 1 : 0;
        $page->body         = Purifier::clean($request->input('body'));


        $page->save();
        $page->tags()->sync($request->tags);

        Session::flash('success', 'The page was successfully updated!');

        // redirect to another page
        return redirect()->route('admin.page.index', $page->id);
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
        $page = Page::find($id);
        $page->tags()->detach();
        $page->delete();
        Session::flash('success','The page was successfully deleted!');
        return redirect()->route('admin.page.index');
    }

    public function comments($id)
    {
        // create a variable and store all the pages in it from the databae
        // find the page in the database and save as a var
        $page = Page::find($id);
        // return the view and pass in the var we previously created
        return view('admin.page.comments')->with('page',$page);
    }
    public function commentApprove(Request $request, $page, $id)
    {
        #dump($page);
        #dd($id);
        $page = Page::find($page);
        if (!Auth::user()->isUser()) {
            $comment = Comment::findOrFail($id);
            $comment->update(['approved' => '1']);
            Session::flash('success','The comment was successfully approved!');
            $data['page']       =$page->title;
            $data['url']        =route('blog.single',[$page->category->slug,$page->slug]);
            $data['user_email'] =$comment->email;
            $data['comment']    =$comment->comment;
            $data['comment_id'] =$comment->id;
            $data['page_id']    =$page->id;
            #dd($data);
            Mail::to($comment->email)->send(new ApprovedComment($data));
            // return the view and pass in the var we previously created
            return redirect()->route('admin.page.comments', $page->id);
        } else {
            Session::flash('error','You don\'t have acces to this feature! Please talk to a member with member role.');
            // return the view and pass in the var we previously created
            return redirect()->route('admin.page.comments', $page->id);
        }

    }
    public function commentDelete(Request $request, $page, $id)
    {
        $page = Page::find($page);
        if (Auth::user()->isUser()) {
            Session::flash('error','You don\'t have acces to this feature!. Please talk to a member with member role.');
            // return the view and pass in the var we previously created
            return redirect()->route('admin.page.comments', $page->id);
        } else {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            Session::flash('success', 'The comment was successfully deleted!');
            // return the view and pass in the var we previously created
            return redirect()->route('admin.page.comments', $page->id);
        }
    }
}
