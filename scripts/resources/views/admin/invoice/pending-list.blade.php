@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Pending Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Pending Invoice</li>
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
                    <h3>Pending Invoice List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Customer Name</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $key=>$invoice)
                            <td>{{$key+1}}</td>
                            <td>
                                {{$invoice->payment->customer->name}}
                                ({{$invoice->payment->customer->mobile_no}}-{{$invoice->payment->customer->address}})
                            </td>
                            <td>#{{$invoice->invoice_no}}</td>
                            <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                            <td>{{$invoice->description}}</td>
                            <td>{{$invoice->payment->total_amount}}</td>

                            <td>
                                @if($invoice->status==0)
                                <span style="background-color:#FC4236;padding:5px;">Pending</span>
                                @elseif($invoice->status==1)
                                <span style="background-color:#5EAB00;padding:5px;">Approved</span>
                                @endif
                            </td>
                            <td>
                                @if($invoice->status==0)
                                <a title="Approve" href="{{route('invoices.approve',$invoice->id)}}" class="btn btn-sm btn-success" id="approveBtn"><i class="fas fa-check-circle"></i></a>
                                <a title="Delete" href="{{route('invoices.delete',$invoice->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                            @endforeach
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
