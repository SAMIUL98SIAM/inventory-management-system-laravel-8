<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= User::where('usertype','admin')->get();
        // $data['allData']= User::all();
        return view('admin.user.index',$data);
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
        $validatedData = $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:users,email'
        ]);
        $code = rand(0000,9999);
        $user = new User() ;
        $user->name = $request->name ;
        $user->role = $request->role ;
        $user->usertype = "admin" ;
        $user->email = $request->email ;
        $user->password = Hash::make($code);
        $user->code = $code;
        // $user_save = $user->save();
        $user->save();
        return redirect()->route('users.view')->with('success','You Added User');
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
        $validatedData = $request->validate([
            'name'=> 'required',
            'email'=>'required'
        ]);

        $user = User::find($id) ;
        $user->name = $request->name ;
        $user->role = $request->role ;
        $user->email = $request->email ;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('users.view')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::destroy($id);
        if($user)
        {
            return redirect()->route('users.view')->with('error','Delete these guy');
        }
    }
}
