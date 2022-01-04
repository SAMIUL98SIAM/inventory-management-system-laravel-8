<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countLogo'] = Logo::count();
        //dd($data['countLogo']);
        $logos= Logo::all();
        return view('admin.logo.index',compact('logos'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo = new Logo();
        $logo->created_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/logo_image'.$logo->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image'),$filename);
            $logo['image'] = $filename;
        }
        $logo->save();
        return redirect()->route('logos.view')->with('success','Logo Added Successfully');
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
        $logo = Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
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
        $logo = Logo::find($id);
        $logo->updated_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_image'.$logo->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image'),$filename);
            $logo['image'] = $filename;
        }
        $logo->save();
        return redirect()->route('logos.view')->with('success','Logo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);
        if(file_exists('/scripts/public/upload/logo_image/'.$logo->image) AND !empty($logo->image))
        {
            unlink('/scripts/public/upload/logo_image/'.$logo->image);
        }
        $logo->delete();
        return redirect()->route('logos.view')->with('error','Logo has been deleted');
    }
}
