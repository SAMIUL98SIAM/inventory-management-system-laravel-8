<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <title>Invoice Report PDF</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="25%"></td>
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

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach ($allData as $key=>$invoice)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$invoice->payment->customer->name}}
                                ({{$invoice->payment->customer->mobile_no}}-{{$invoice->payment->customer->address}})
                            </td>
                            <td>#{{$invoice->invoice_no}}</td>
                            <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                            <td>{{$invoice->description}}</td>
                            <td>{{$invoice->payment->total_amount}}</td>
                        @php
                            $total_sum += $invoice->payment->total_amount ;
                        @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">Grand Total</td>
                            <td>{{$total_sum}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 40%"></td>
                            <td style="width: 20%"></td>
                            <td style="40%; text-align:center;">
                                <p style="text-align: center; border-bottom:1px solid #000;">Owner Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
