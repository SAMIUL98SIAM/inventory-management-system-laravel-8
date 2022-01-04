@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Approved Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Approved Order</li>
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
                    <h3>Orders details info</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('orders.approved.list')}}"><i class="fa fa-list"> Orders Approved List</i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="txt-center mytable" width="100%" border="1">
                        <tr>
                            <td width="30%"><strong>Billing Info:</strong></td>
                            <td colspan="2" style="text-align: left;">
                                <strong>Name: </strong> {{$order->shipping->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Mobile no: </strong> {{$order->shipping->mobile_no}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                <strong>Email: </strong> {{$order->shipping->email}} &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Address: </strong> {{$order->shipping->address}} &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                <strong>Payment: </strong>
                                {{$order->payment->payment_method}}
                                @if ($order->payment->payment_method=='Bkash')
                                (Transaction no: {{$order->payment->transaction_no}})
                                @endif
                                <strong>Order no: # {{$order->order_no}}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Order Details:</strong> </td>
                        </tr>
                        <tr>
                            <td><strong>Product Name & Image</strong></td>
                            <td><strong>Color & Size</strong></td>
                            <td><strong>Quantity & Price</strong></td>
                        </tr>
                        @foreach ($order->order_details as $details)
                        <tr>
                            <td>
                                <img src="{{!empty($details->product->image) ? url('/scripts/public/upload/product_image/'.$details->product->image):url('/upload/no_image.jpg')}}" width="50px" height="55px"> &nbsp; {{$details->product->name}}
                            </td>
                            <td>
                                {{$details->color->name}} &nbsp; & &nbsp; {{$details->size->name}}
                            </td>
                            <td>
                                @php
                                    $sub_total = $details->quantity*$details->product->price ;
                                @endphp
                                {{$details->quantity}} X {{$details->product->price}} = {{$sub_total}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right;">GrandTotal</td>
                            <td><strong>{{$order->order_total}}</strong></td>
                        </tr>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
    $(function () {
      $('#myForm').validate({
        rules: {
          name: {
              required: true,
          },
        },
        messages: {
          name: {
            required: "Please enter a name",
            equalTo: "#name"
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
