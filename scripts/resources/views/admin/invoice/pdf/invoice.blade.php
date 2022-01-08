<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <title>Invoice PDF</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Invoice No #{{$invoice->invoice_no}}</strong></td>
                            <td>
                                <span style="font-size: 20px;background-color:blue;color:#ddd;">Adom Ali Market<br> Uttara-Dhaka</span>
                            </td>
                            <td>
                                <span>Showroom: 01992569682 <br>
                                    Owner No: 01941393332
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="35%"></td>
                            <td style="text-decoration: none;"><strong>Customer Invoice: </strong></td>
                            <td width="30%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @php
                $payment =  App\Models\Payment::where('invoice_id',$invoice->id)->first();
                @endphp
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>Name: </strong>{{$payment->customer->name}}</td>
                            <td width="30%"><strong>Mobile: </strong>{{$payment->customer->mobile_no}}</td>
                            <td width="40%"><strong>Address: </strong>{{$payment->customer->address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table width="100%" border="1" style="margin-bottom: 10px;">
                    <thead>
                        <tr>
                            <th class="text-center">SL.</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Product Name: </th>
                            <th class="text-center">Current Stock: </th>
                            <th class="text-center">Quantity: </th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum =0 ;
                        @endphp
                        @foreach ($invoice->invoice_detail as $key=>$details)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">{{$details->category->name}}</td>
                            <td class="text-center">{{$details->product->name}}</td>
                            <td class="text-center">{{$details->product->quantity}}</td>
                            <td class="text-center">{{$details->selling_qty}}</td>
                            <td class="text-center">{{$details->unit_price}}</td>
                            <td class="text-center">{{$details->selling_price}}</td>
                        </tr>
                        @php
                            $total_sum+= $details->selling_price ;
                        @endphp
                        @endforeach
                        <tr>
                            <td class="text-center" colspan="6"><strong>Sub Total</strong> </td>
                            <td class="text-center">{{$total_sum}}</td>
                        </tr>

                        <tr>
                            <td class="text-center" colspan="6"><strong>Discount</strong> </td>
                            <td class="text-center">{{$payment->discount_amount}}</td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="6"><strong>Paid Amount</strong> </td>
                            <td class="text-center">{{$payment->paid_amount}}</td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="6"><strong>Due Amount</strong> </td>
                            <td class="text-center">{{$payment->due_amount}}</td>
                        </tr>

                        <tr>
                            <td class="text-center" colspan="6"><strong>Grand Total</strong> </td>
                            <td class="text-center">{{$payment->total_amount}}</td>
                        </tr>
                    </tbody>
                </table>
                @php
                    $date = new DateTime('now', new DateTimezone('Asia/Dhaka'))
                @endphp
                <i>Printing time: {{$date->format('F j, Y, g:i a')}}</i>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 40%">
                                <p style="text-align: center;margin-left:20px; border-bottom:1px solid #000;">Customer Signature</p>
                            </td>
                            <td style="width: 20%"></td>
                            <td style="40%; text-align:center;">
                                <p style="text-align: center; border-bottom:1px solid #000;">Seller Request</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
