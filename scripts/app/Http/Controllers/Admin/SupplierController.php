<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= Supplier::all();
        // $data['allData']= Supplier::all();
        return view('admin.supplier.index',$data);
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
            'email'=>'required|unique:suppliers,email'
        ]);
        $supplier = new Supplier() ;
        $supplier->name = $request->name ;
        $supplier->mobile_no = $request->mobile_no ;
        $supplier->email = $request->email ;
        $supplier->address = $request->address ;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();
        return redirect()->route('suppliers.view')->with('success','You Added Supplier');
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

        $supplier = Supplier::find($id) ;
        $supplier->name = $request->name ;
        $supplier->mobile_no = $request->mobile_no ;
        $supplier->email = $request->email ;
        $supplier->address = $request->address ;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();
        return redirect()->route('suppliers.view')->with('success','Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier =  Supplier::destroy($id);
        if($supplier)
        {
            return redirect()->route('suppliers.view')->with('error','Delete these Supplier');
        }
    }
}

