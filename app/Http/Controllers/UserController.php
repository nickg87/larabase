<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all our category
        // it will also hace a form to create a new category // deci nu mai e nevoie de create()
        $users =  User::orderBy('id','desc')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save a new user --> redirect to users index
        // validate the data
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ));
        // store in the database
        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->isAdmin      = 1;
        $user->created_at   = Carbon::now()->toDateTimeString();
        $user->updated_at   = Carbon::now()->toDateTimeString();
        if (Auth::user()->isAdmin()) {
            $user->save();
            Session::flash('success', 'The user was successfully saved!');
            // redirect to another page
            return redirect()->route('admin.user.index');
        } else {
            Session::flash('error','You don\'t have acces to this feature!');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact(user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDetails(Request $request, $id)
    {
        //
        // save a new user --> redirect to users index
        // validate the data
        $user = User::find($id);
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        // store in the database
        $user->name    = $request->name;
        $user->phone    = $request->phone;
        $user->description    = $request->description;
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();
        Session::flash('success','The user was successfully saved!');
        // redirect to another page
        return redirect()->route('admin.user.index');
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
        // save a new user --> redirect to users index
        // validate the data
        $user = User::find($id);
        $this->validate($request, array(
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|confirmed',
        ));
        // store in the database
        $user->email    = $request->email;
        $user->password    = Hash::make($request->password);
        $user->updated_at = Carbon::now()->toDateTimeString();

        if ($request->hasFile('avatar')) {

            // add the new photo
            $image      = $request->file('avatar');
            $filename   = 'avatar-'. $id . '.' . $image->getClientOriginalExtension();
            $location   = public_path('images/icon/'.$filename);
            $authorloc   = public_path('images/author/'.$filename);
            //Image::make($image)->resize(100,null,function($constraint){$constraint->aspectRatio();})->fit(100)->save($location);
            Image::make($image)->fit(100)->save($location);
            Image::make($image)->fit(350)->save($authorloc);
            //Image::make($image)->fit(100,null,function($constraint){$constraint->aspectRatio();})->save($location);
            $old_avatar = $user->avatar;
            //update the new photo
            $user->avatar = $filename;
            if (!empty($old_avatar) && $old_avatar<>$filename)
            {
                // delete the old photo
                Storage::delete(public_path('images/icon/'.$old_avatar));
                unlink(public_path('images/icon/'.$old_avatar));
                Storage::delete(public_path('images/author/'.$old_avatar));
                unlink(public_path('images/author/'.$old_avatar));
            }


        }
        if (Auth::user()->isAdmin())
        {
            $user->save();
            Session::flash('success','The user was successfully saved!');
            // redirect to another page
            return redirect()->route('admin.user.index');
        } else {
            Session::flash('error','You don\'t have acces to this feature!');
            return Redirect::back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        //
        //dd($request);
        // save a new user --> redirect to users index
        // validate the data
        $user = User::find($id);
        $this->validate($request, array(
            'isAdmin' => 'required'
        ));
        // store in the database
        $user->isAdmin    = $request->isAdmin;
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();
        Session::flash('success','The user role was successfully updated!');
        // redirect to another page
        return redirect()->route('admin.user.index');
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
        $user = User::find($id);
        unlink(public_path('images/icon/'.$user->avatar));
        unlink(public_path('images/author/'.$user->avatar));
        $user->delete();
        Session::flash('success','The user was successfully deleted!');
        return redirect()->route('admin.user.index');
    }
}
