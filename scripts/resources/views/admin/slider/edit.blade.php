@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Slider</li>
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
                    <h3>Edit Slider</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('sliders.view')}}"><i class="fa fa-list"> slider List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('sliders.update',$slider->id) }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-5">
                                    <label class="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                                <div class="col-5" style="padding-top: 10px;">
                                    <img id="showImage" src="{{!empty($slider->image)?url('/scripts/public/upload/slider_image/'.$slider->image):url('/upload/no_image.jpg')}}" height="150px" width="130px;"  style="border: 1px solid #000;" alt="Card image cap"/>
                                </div>
                                <div class="col-5">
                                    <label class="short_title">Short Title</label>
                                    <input type="text" name="short_title" id="short_title" value="{{$slider->short_title}}"  class="form-control" placeholder="Short Title">
                                </div>
                                <div class="col-5">
                                    <label class="long_title">Long Title</label>
                                    <input type="text" name="long_title" id="long_title" value="{{$slider->long_title}}"  class="form-control" placeholder="Long Title">
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

