<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd($data['countpurchase']);
        $data['invoices']= Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view('admin.invoice.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if($invoice_data == null)
        {
            $firstReg = 1 ;
            $data['invoice_no'] = $firstReg+1;
        }
        else
        {
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no ;
            $data['invoice_no'] = $invoice_data+1;
        }
        $data['customers'] = Customer::all();
        $data['date'] = date('Y-m-d');
        return view('admin.invoice.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if($request->category_id == null)
        {
            return redirect()->back()->with('error','Sorry, You do not select any products');
        }
        else
        {
            $pa = $request->paid_amount;
            $em = $request->estimated_amount;
            if($pa>$em){
                return redirect()->back()->with('error','Sorry! paid amount is maximum than total price');
            }
            else {
                $invoice  = new Invoice();
                $invoice->invoice_no = $request->invoice_no ;
                $invoice->date = date('Y-m-d',strtotime($request->date));
                $invoice->description = $request->description ;
                $invoice->status = 0 ;
                $invoice->created_by = Auth::user()->id ;
                DB::transaction(function() use($request,$invoice){
                    if($invoice->save())
                    {
                        $count_category = count($request->category_id);
                        for ($i=0; $i <$count_category ; $i++) {
                            $invoice_details = new InvoiceDetail();
                            $invoice_details->date = date('Y-m-d',strtotime($request->date));
                            $invoice_details->invoice_id = $invoice->id ;
                            $invoice_details->category_id = $request->category_id[$i] ;
                            $invoice_details->product_id = $request->product_id[$i] ;
                            $invoice_details->selling_qty = $request->selling_qty[$i] ;
                            $invoice_details->unit_price = $request->unit_price[$i] ;
                            $invoice_details->selling_price = $request->selling_price[$i] ;
                            $invoice_details->status = 1 ;
                            $invoice_details->save();
                        }

                        if($request->customer_id == '0')
                        {
                            $customer = new Customer();
                            $customer->name = $request->name ;
                            $customer->mobile_no = $request->mobile_no ;
                            $customer->address = $request->address ;
                            $customer->save() ;
                            $customer_id = $customer->id ;
                        }
                        else
                        {
                            $customer_id = $request->customer_id ;
                        }
                        $payment = new Payment();
                        $payment_details = new PaymentDetail();
                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status ;
                        $payment->discount_amount = $request->discount_amount ;
                        $payment->total_amount = $request->estimated_amount ;

                        if($request->paid_status == 'full_paid')
                        {
                            $payment->paid_amount = $request->estimated_amount ;
                            $payment->due_amount = 0 ;
                            $payment_details->current_paid_amount = $request->estimated_amount ;
                        }
                        elseif($request->paid_status == 'full_due')
                        {
                            $payment->paid_amount = 0 ;
                            $payment->due_amount = $request->estimated_amount  ;
                            $payment_details->current_paid_amount = 0 ;
                        }
                        elseif($request->paid_status == 'partial_paid')
                        {
                            $payment->paid_amount = $request->paid_amount ;
                            $payment->due_amount = $request->estimated_amount - $request->paid_amount ;
                            $payment_details->current_paid_amount = $request->paid_amount ;
                        }
                        $payment->save();
                        $payment_details->invoice_id = $invoice->id ;
                        $payment_details->date = $request->date('Y-m-d',strtotime($request->date));
                        $payment_details->save();
                    }
                });
            }
        }
        return redirect()->route('invoices.view')->with('success','Data has been saved');
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
        return view('admin.invoice.edit',$data);
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
        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetail::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetail::where('invoice_id',$invoice->id)->delete();

        return redirect()->route('invoices.pending')->with('error','Invoice has been deleted');
    }

    public function pending(Request $request)
    {
        $data['invoices']= Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',0)->get();
        return view('admin.invoice.pending-list',$data);
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

