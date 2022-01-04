<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['countLogo'] = Logo::count();
        //dd($data['countLogo']);
        $sliders= Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->short_title = $request->short_title;
        $slider->long_title = $request->long_title;
        $slider->created_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/slider_image'.$slider->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_image'),$filename);
            $slider['image'] = $filename;
        }
        $slider->save();
        return redirect()->route('sliders.view')->with('success','slider Added Successfully');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);
        $slider->short_title = $request->short_title;
        $slider->long_title = $request->long_title;
        $slider->updated_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/slider_image'.$slider->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_image'),$filename);
            $slider['image'] = $filename;
        }
        $slider->save();
        return redirect()->route('sliders.view')->with('success','slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = slider::find($id);
        if(file_exists('/scripts/public/upload/slider_image/'.$slider->image) AND !empty($slider->image))
        {
            unlink('/scripts/public/upload/slider_image/'.$slider->image);
        }
        $slider->delete();
        return redirect()->route('sliders.view')->with('error','slider has been deleted');
    }

    public function activate($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return redirect()->route('sliders.view')->with('status','Slider has been activated');
    }

    public function unactivate($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return redirect()->route('sliders.view')->with('error','Slider has been unactivated');
    }
}
