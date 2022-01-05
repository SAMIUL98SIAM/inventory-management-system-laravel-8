<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= Customer::all();
        // $data['allData']= Customer::all();
        return view('admin.customer.index',$data);
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
        $customer = new Customer() ;
        $customer->name = $request->name ;
        $customer->mobile_no = $request->mobile_no ;
        $customer->email = $request->email ;
        $customer->address = $request->address ;
        $customer->created_by = Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','You Added Customer');
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

        $customer = Customer::find($id) ;
        $customer->name = $request->name ;
        $customer->mobile_no = $request->mobile_no ;
        $customer->email = $request->email ;
        $customer->address = $request->address ;
        $customer->updated_by = Auth::user()->id;
        $customer->save();
        return redirect()->route('customers.view')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer =  Customer::destroy($id);
        if($customer)
        {
            return redirect()->route('customers.view')->with('error','Delete these Customer');
        }
    }
}
