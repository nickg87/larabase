<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Rules\ValidCaptcha;
use App\Banner;
use App\Page;
use App\User;
use App\Testimonial;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $banners = Banner::orderBy('id','desc')->get();
        $latest = Page::orderBy('id','desc')->where('is_static','<>','1')->limit(6)->get();
        $authors = User::withCount('posts')->orderBy('posts_count','desc')->having('posts_count','>','0')->get();
        $testimonials = Testimonial::orderBy('id','desc')->limit(4)->get();
        #dd($authors);
        return view('front.index')->withBanners($banners)->withLatest($latest)->withAuthors($authors)->withTestimonials($testimonials);
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function postContact(Request $request) {
        $gresponse =  $_POST['g-recaptcha-response'];


        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'response' => ['boolean', new ValidCaptcha($gresponse)]
        ));

        $body = "";
        $body .= "<p><b>From: </b>".$request->name."</p>";
        $body .= "<p><b>Email: </b>".$request->email."</p>";
        $body .= "<p><b>message: </b>".$request->message."</p>";

        $subject = "New contact mail: ".$request->subject; // Enter your subject here

        $data = array (
            'email'     =>$request->email,
            'subject'   =>$subject,
            'body'      =>$body,
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('guliman.nicu@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your message was successfully sent!');
        //return contact page
        return view('front.contact');

    }
}
