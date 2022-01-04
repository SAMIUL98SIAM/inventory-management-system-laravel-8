@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
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
                    <h3>Edit Contact</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('contacts.view')}}"><i class="fa fa-list">Contact List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('contacts.update',$contact->id) }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-5">
                                    <label class="address">Address</label>
                                    <input type="address" name="address" id="address" value="{{$contact->address}}" class="form-control" placeholder="Address">
                                </div>
                                <div class="col-5">
                                    <label class="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{$contact->email}}" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-5">
                                    <label class="mobile_no">Mobile No</label>
                                    <input type="mobile_no" name="mobile_no" id="mobile_no" value="{{$contact->mobile_no}}" class="form-control" placeholder="Mobile No">
                                </div>
                                <div class="col-5">
                                    <label class="facebook">Facebook</label>
                                    <input type="facebook" name="facebook" id="facebook" value="{{$contact->facebook}}" class="form-control" placeholder="Facebook">
                                </div>
                                <div class="col-5">
                                    <label class="twitter">Twitter</label>
                                    <input type="twitter" name="twitter" id="twitter" value="{{$contact->twitter}}" class="form-control" placeholder="Twitter">
                                </div>
                                <div class="col-5">
                                    <label class="youtube">Youtube</label>
                                    <input type="youtube" name="youtube" id="youtube" value="{{$contact->youtube}}" class="form-control" placeholder="Youtube">
                                </div>
                                <div class="col-5">
                                    <label class="linkedin">LinkedIn</label>
                                    <input type="linkedin" name="linkedin" id="linkedin" value="{{$contact->linkedin}}" class="form-control" placeholder="Linkedin">
                                </div>
                                <div class="col-5">
                                    <label class="google_plus">Google Plus</label>
                                    <input type="google_plus" name="google_plus" id="google_plus" value="{{$contact->google_plus}}" class="form-control" placeholder="Google Plus">
                                </div>
                                <div class="col-2" style="padding-top: 30px;">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                         </form>
                        {{-- <div class="row"> --}}
                        </div>
                        <!-- /.card-body -->
                      </div>
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

