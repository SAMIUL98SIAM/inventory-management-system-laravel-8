<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <title>Daily Invoice Report PDF</title>
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
                            <td width="40%"></td>
                            <td><u><strong><span style="font-size: 15px;"> Daily Purchase Report - ({{date('d-m-Y',strtotime($start_date))}} - {{ date('d-m-Y',strtotime($end_date))}})</span></strong></u></td>
                            <td></td>
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
                            <th>Purchase No</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach ($allData as $key=>$purchase)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>#{{$purchase->purchase_no}}</td>
                            <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                            <td>{{$purchase->product->name}}</td>
                            <td>
                                {{$purchase->buying_qty}}
                                {{$purchase['product']['unit']['name']}}
                            </td>

                            <td>{{$purchase->unit_price}}</td>
                            <td>{{$purchase->buying_price}}</td>
                        @php
                            $total_sum +=$purchase->buying_price;
                        @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td style="text-align: right;" colspan="6"><strong>Grand Total</strong></td>
                            <td>{{$total_sum}}</td>
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
