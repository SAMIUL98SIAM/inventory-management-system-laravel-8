<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd($data['countpurchase']);
        $data['purchases']= Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('admin.purchase.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        $data['purchases']= Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('admin.purchase.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->category_id == null)
        {
            return redirect()->back()->with('error','Sorry, You do not select any items');
        }
        else
        {
           $count_category = count($request->category_id);
            for ($i=0; $i <$count_category ; $i++) {
               $purchase = new Purchase();
               $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
               $purchase->purchase_no = $request->purchase_no[$i] ;
               $purchase->supplier_id = $request->supplier_id[$i] ;
               $purchase->category_id = $request->category_id[$i] ;
               $purchase->product_id = $request->product_id[$i] ;
               $purchase->buying_qty = $request->buying_qty[$i] ;
               $purchase->unit_price = $request->unit_price[$i] ;
               $purchase->buying_price = $request->buying_price[$i] ;
               $purchase->description = $request->description[$i] ;
               $purchase->created_by = Auth::user()->id ;
               $purchase->status = 0 ;
               $purchase->save();
            }
        }
        return redirect()->route('purchases.view')->with('success','Purchase has been saved');
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
        $data['editData'] = Purchase::find($id);
        return view('admin.purchase.edit',$data);
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
        $purchase = Purchase::find($id);
        $purchase->updated_by = Auth::user()->id;
        $purchase->save();
        return redirect()->route('purchases.view')->with('success','Purchase Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchases.view')->with('error','Purchase has been deleted');
    }

    public function pending(Request $request)
    {
        $data['purchases']= Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status',0)->get();
        return view('admin.purchase.pending-list',$data);
    }

    public function approve(Request $request,$id)
    {
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save())
        {
            DB::table('purchases')->where('id',$id)->update(['status'=>1]);
        }
        return redirect()->route('purchases.pending')->with('success','Data approved successfully');
    }
}
