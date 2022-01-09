@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Credit Customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Credit Customer</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3>Edit Invoice (Invoice No # {{$payment->invoice->invoice_no}})</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit')}}"><i class="fa fa-list"> View Credit Customer List</i></a>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="3"><strong>Customer Info:</strong> </td>
                            </tr>
                            <tr>
                                <td><strong>Customer's Name: </strong>{{$payment->customer->name}}</td>
                                <td><strong>Mobile: </strong>{{$payment->customer->mobile_no}}</td>
                                <td><strong>Address: </strong>{{$payment->customer->address}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post" action="{{route('customers.invoice.update',$payment->invoice_id)}}" id="myForm">
                        <table id="example1" class="table table-bordered table-hover">
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
                                    $invoice_detail = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                                @endphp
                                @foreach ($invoice_detail as $key=>$details)
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
                                    <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}" >
                                    <td class="text-center">{{$payment->due_amount}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center" colspan="6"><strong>Grand Total</strong> </td>
                                    <td class="text-center">{{$payment->total_amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                         <div class="row">
                            @csrf
                            <div class="form-group col-md-3">
                                <label>Paid Status</label>
                                <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                    <option value="">Select Status</option>
                                    <option value="full_paid">Full Paid</option>
                                    <option value="partial_paid">Partial Paid</option>
                                </select>
                                <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter paid amount" style="display: none;">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="data">Date</label>
                                <input type="text" name="date" id="date" class="form-control form-control-sm singledatepicker" value="{{$date}}" placeholder="YYYY-MM-DD" readonly required>
                            </div>
                            <div class="form-group col-md-3" style="padding-top: 31px">
                                <button type="submit" class="btn btn-primary btn-sm">Invoice Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@section('scripts')


<script>
    $(document).on('change','#paid_status',function(){
        var paid_status = $(this).val();
        if(paid_status == 'partial_paid')
        {
            $('.paid_amount').show();
        }
        else
        {
            $('.paid_amount').hide();
        }
    });

    $(document).on('change','#customer_id',function(){
        var customer_id = $(this).val();
        if(customer_id == '0')
        {
            $('.new_customer').show();
        }
        else
        {
            $('.new_customer').hide();
        }
    });
</script>

<script>
    $(function () {
      $('#myForm').validate({
        rules: {
         paid_status: {
              required: true,
          },
          date: {
              required: true,
          },
        },
        messages: {
          paid_status: {
            required: "Please enter paid status",
          },
          date: {
            required: "Please enter date",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection
