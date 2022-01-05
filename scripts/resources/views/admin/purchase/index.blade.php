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
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Purchase No</th>
                                <th>Data</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $key=>$purchase)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$purchase->purchase_no}}</td>
                                <td>{{$purchase->date}}</td>
                                <td>{{$purchase['product']['name']}}</td>
                                <td>{{$purchase['unit']['name']}}</td>
                                <td>
                                    <a title="Edit" href="{{route('purchases.edit',$purchase->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a title="Delete" href="{{route('purchases.delete',$purchase->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
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
