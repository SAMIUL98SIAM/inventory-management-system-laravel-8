<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= Product::all();
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        // $data['allData']= Product::all();
        return view('admin.product.index',$data);
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

        $product = new Product() ;
        $product->supplier_id = $request->supplier_id ;
        $product->unit_id = $request->unit_id ;
        $product->category_id = $request->category_id ;
        $product->name = $request->name ;
        $product->created_by = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','You Added Product');
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

        $product = Product::find($id) ;
        $product->supplier_id = $request->supplier_id ;
        $product->unit_id = $request->unit_id ;
        $product->category_id = $request->category_id ;
        $product->name = $request->name ;
        $product->updated_by = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::destroy($id);
        if($product)
        {
            return redirect()->route('products.view')->with('error','Delete these Product');
        }
    }
}
