<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
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
    public function creditCustomer()
    {
        $data['allData']= Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('admin.customer.credit-customer',$data);
    }

    public function creditCustomerPdf(){
        $data['allData']= Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        $pdf = PDF::loadView('admin.customer.pdf.credit-customer',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('invoice.pdf');
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
    public function invoice_edit($invoice_id)
    {
       $data['date'] = date('Y-m-d');
       $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
       return view('admin.customer.edit-invoice',$data);
    }

    public function invoice_update(Request $request,$invoice_id)
    {
        if($request->new_paid_amount<$request->paid_amount)
        {
           return redirect()->back()->with('error','Sorry! you paid maximum value');
        }
        else
        {
           $payment = Payment::where('invoice_id',$invoice_id)->first();
           $payment_detail = new PaymentDetail();
           $payment->paid_status = $request->paid_status ;
            if($request->paid_status == 'full_paid')
            {
               $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount ;
               $payment->due_amount = 0 ;
               $payment_detail->current_paid_amount = $request->new_paid_amount;
            }
            elseif($request->paid_status == 'partial_paid')
            {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount'] + $request->paid_amount ;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount'] - $request->paid_amount ;
                $payment_detail->current_paid_amount = $request->paid_amount;
            }
            $payment->save();
            $payment_detail->invoice_id = $invoice_id ;
            $payment_detail->date = date('Y-m-d',strtotime($request->date));
            $payment_detail->save();
            return redirect()->route('customers.credit')->with('success','Data saved successfully');
        }
    }


    public function invoiceDetailsPdf($invoice_id)
    {
        $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
        $pdf = PDF::loadView('admin.customer.pdf.customer-invoice-detail',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('invoice-report.pdf');
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
