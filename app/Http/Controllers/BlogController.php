<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthorContact;
use App\Page;
use App\Category;
use App\Menu;
use App\User;
use App\Tag;
use App\Rules\ValidCaptcha;
use Session;
use Response;


class BlogController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the pages in it from the databae
        $pages = Page::orderBy('id','desc')->where('is_static','<>','1')->paginate(9);
        return view('front.blog')->withPages($pages);
        // return view and pass int the above variable
    }

    public function getSingle($category_slug,$slug)
    {
        // fetch from the db based on slug
        $page = Page::where('slug', '=', $slug)->first();
        // return the view and pass in the post object
        if (isset($page)) {
            if ($page->isStatic()) {
                return $this->getStatic($page->slug);
            } else {
                $categories = Category::withCount('posts')->orderBy('posts_count','desc')->has('posts','>','0')->get();
                //dd($categories);
                return view('front.blog_single')->withPage($page)->withCategories($categories);
            }
        } else {
            $pages = Page::orderBy('id','desc')->where('is_static','<>','1')->paginate(9);
            return redirect()->route('blog')->withPages($pages);
        }
    }

    public function getCategory($category_slug)
    {
        // fetch from the db based on slug
        $category = Category::where('slug', '=', $category_slug)->first();
        // return the view and pass in the post object
        if (isset($category)) {
            $pages = Page::where([
                    ['category_id','=',$category->id],
                    ['is_static', false]
                    ])->paginate(9);
            //dd($pages);
            return view('front.blog_category')->with('category', $category)->withPages($pages);
        } else {
            return $this->getStatic($category_slug);
        }
    }

    public function getStatic($slug)
    {
        // fetch from the db based on slug
        $menu = Menu::where('slug', '=', $slug)->first();
        if (isset($menu)) {
            return $this->getMenu($slug);
        } else {
            $page = Page::where('slug', '=', $slug)->firstOrFail();
            // return the view and pass in the post object
            if (isset($page)) {
                if ($page->isStatic()) {
                    return view('front.static')->with('page', $page);
                } else {
                    return $this->getSingle($page->category->slug, $page->slug);
                }
            }
        }

    }
    public function getAuthorPage($id)
    {
        #dump($id);
        $author = User::findOrFail($id);
        #$pages =$author->posts->paginate(9);
        $pages = Page::where([
            ['author_id','=',$id],
            ['is_static', false]
        ])->paginate(9);
        #dd($pages);
        return view('front.blog_author')->withAuthor($author)->withPages($pages);
    }

    public function sendAuthorMessage($id, Request $request)
    {
        $gresponse =  $_POST['g-recaptcha-response'];


        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'response' => ['boolean', new ValidCaptcha($gresponse)]
        ));

        $author = User::findOrFail($id);
        $data['user_email'] =$request->email;
        $data['user_name'] =$request->name;
        $data['message']    =$request->message;
        #dd($data);
        Mail::to($author->email)->send(new AuthorContact($data));

        Session::flash('success','Your message was successfully sent!');
        //return author page
        return $this->getAuthorPage($id);

    }
    public function getMenu($slug)
    {
        // fetch from the db based on slug
        $menu = Menu::where('slug', '=', $slug)->first();
        // return the view and pass in the post object
        if (isset($menu)) {
            return view('front.menu')->with('menu', $menu);
        }
    }
    public function getTag($id, $slug)
    {
        // fetch from the db based on slug
        $tag = tag::findOrFail($id);
        // return the view and pass in the post object
        if (isset($tag)) {
            return view('front.tag')->with('tag', $tag);
        }
    }
}
