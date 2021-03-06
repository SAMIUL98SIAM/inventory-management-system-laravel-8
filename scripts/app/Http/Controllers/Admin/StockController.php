<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        // $data['allData']= Product::all();
        return view('admin.stock.report',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('admin.stock.pdf.stock-report',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('stock-report.pdf');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reportSupplierProductWise()
    {
        $data['suppliers'] = Supplier::all();
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        return view('admin.stock.report-supplier-product-wise',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportSupplierWisePdf(Request $request)
    {
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('admin.stock.pdf.supplier-wise-report',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-wise-stock-report.pdf');
    }

    public function reportProductWisePdf(Request $request)
    {
        $data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf = PDF::loadView('admin.stock.pdf.product-wise-report',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('product-wise-stock-report.pdf');
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
