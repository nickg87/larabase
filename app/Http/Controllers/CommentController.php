<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewComment;
use App\Rules\ValidCaptcha;
use Illuminate\Http\Request;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $page_id)
    {
        $gresponse =  $_POST['g-recaptcha-response'];
        //
        $this->validate($request, array(
                'name' => 'required|max:255',
                'email' => 'required|email',
                'comment'=> 'required|min:5',
                'response' => ['boolean', new ValidCaptcha($gresponse)]
            )
        );

        $page = Page::find($page_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->page()->associate($page);

        $comment->save();
        $data=[];
        $data['page']       =$page->title;
        $data['url']        =route('blog.single',[$page->category->slug,$page->slug]);
        $data['user_email'] =$request->email;
        $data['user_name']  =$request->name;
        $data['comment']    =$request->comment;
        $data['comment_id'] =$comment->id;
        $data['page_id']    =$page->id;
        #dd($data);
        Mail::to('guliman.nicu@gmail.com')->send(new NewComment($data));
        Session::flash('success','Comment was added and pending approval');
        return redirect()->to(route('blog.single', [$page->category->slug,$page->slug]).'#comments');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
