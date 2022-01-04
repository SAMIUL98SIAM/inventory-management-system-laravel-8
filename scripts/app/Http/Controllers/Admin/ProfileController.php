<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Whoops\Run;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.index',compact('user'));
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
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name'=> 'required',
        //     'usertype'=> 'required',
        //     'email'=>'required'
        // ]);

        // $id = Auth::user()->id;
        // $user = User::find($id);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name ;
        //$user->usertype = $request->usertype ;
        $user->email = $request->email ;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        // $user_save = $user->save();
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_image'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->route('profiles.view')->with('success','You update your profile');
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
    }


    public function passworView()
    {
        return view('admin.profile.edit_password');
    }

    public function passworUpdate(Request $request)
    {
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password Changed Successfully');
        }
        else
        {
          return redirect()->back()->with('error','Sorry!! Your password does not match');
        }
    }
}
