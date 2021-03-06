@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Purchase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Purchase</li>
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
                    <h3>Purchase List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('purchases.create')}}"><i class="fa fa-plus-circle"> Create Purchase</i></a>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Purchase No</th>
                                <th>Data</th>
                                <th>Supplier Name</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Buying Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $key=>$purchase)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$purchase->purchase_no}}</td>
                                <td> {{ date('d-m-Y',strtotime($purchase->date))}}</td>
                                <td>{{$purchase->supplier->name}}</td>
                                <td>{{$purchase->category->name}}</td>
                                <td>{{$purchase['product']['name']}}</td>
                                <td>{{$purchase->description}}</td>
                                <td>
                                    {{$purchase->buying_qty}}
                                    {{$purchase->product->unit->name}}
                                </td>
                                <td>{{$purchase->unit_price}}</td>
                                <td>{{$purchase->buying_price}}</td>
                                <td>
                                    @if($purchase->status==0)
                                    <span style="background-color:#FC4236;padding:5px;">Pending</span>
                                    @elseif($purchase->status==1)
                                    <span style="background-color:#5EAB00;padding:5px;">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a title="Edit" href="{{route('purchases.edit',$purchase->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> --}}
                                    @if($purchase->status==0)
                                    <a title="Delete" href="{{route('purchases.delete',$purchase->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
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
