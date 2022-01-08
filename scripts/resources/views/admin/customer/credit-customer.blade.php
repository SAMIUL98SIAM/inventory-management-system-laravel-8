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
                    <h3>Credit customer List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit.pdf')}}"><i class="fa fa-download"> Dowload PDF</i></a>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_sum = 0;
                            @endphp
                            @foreach ($allData as $key=>$payment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$payment->customer->name}}
                                    ({{$payment->customer->mobile_no}} - {{$payment->customer->address}})
                                </td>
                                <td>Invoice No #{{$payment->invoice->invoice_no}}</td>
                                <td>{{date("d-m-Y",strtotime($payment->invoice->date))}}</td>
                                <td>{{$payment->due_amount}} TK</td>
                                <td>
                                    <a title="Edit" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                                    <a title="Details" class="btn btn-sm btn-success" href=""><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @php
                                $total_sum += $payment->due_amount;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <table id="example1" class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align: right;font-weight:bold;">Grand Total: </td>
                                <td><strong>{{$total_sum}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /.card-body -->
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
    $(function () {
      $('#myForm').validate({
        rules: {
         address: {
              required: true,
          },
          name: {
              required: true,
          },
          email: {
            required: true,
            email: true,
          },
          mobile_no: {
            required: true,
          }
        },
        messages: {
          address: {
            required: "Please enter an address",
          },
          name: {
            required: "Please enter a name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          mobile_no: {
            required: "Please enter a mobile no"
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
