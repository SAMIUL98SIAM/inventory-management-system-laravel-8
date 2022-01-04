@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
                    <h3>Details Product</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"> Product List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="50%">Cateogory</td>
                                <td width="50%">{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Brand</td>
                                <td width="50%">{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Product Name</td>
                                <td width="50%">{{$product->name}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Product Price</td>
                                <td width="50%">{{$product->price}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Short Description</td>
                                <td width="50%">{{$product->short_desc}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Long Description</td>
                                <td width="50%">{{$product->long_desc}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Image</td>
                                <td width="50%"><img src="{{!empty($product->image) ? url('/scripts/public/upload/product_image/'.$product->image):url('/upload/no_image.jpg')}}" width="120px" height="130px"></td>
                            </tr>
                            <tr>
                                <td width="50%">Colors</td>
                                <td width="50%">
                                    @php
                                        $colors = App\Models\ProductColor::where('product_id',$product->id)->get();
                                    @endphp
                                    @foreach ($colors as $color)
                                       {{$color->color->name}} ,
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">Sizes</td>
                                <td width="50%">
                                    @php
                                        $sizes = App\Models\ProductSize::where('product_id',$product->id)->get();
                                    @endphp
                                    @foreach ($sizes as $size)
                                        {{$size->size->name}} ,
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                        <tr>
                            <td width="50%">Sub Images</td>
                            <td width="50%">
                                @php
                                    $sub_images = App\Models\ProductSubImage::where('product_id',$product->id)->get();
                                @endphp
                                @foreach ($sub_images as $sub_image)
                                <img style="border: 1px solid #000; margin-left:0.89px;" src="{{url('/scripts/public/upload/product_image/product_sub_image/'.$sub_image->sub_image)}}" width="100px" height="100px">
                                @endforeach
                            </td>
                        </tr>
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
         usertype: {
              required: true,
          },
          name: {
              required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
              required: true,
              equalTo: '#password'
          }

        },
        messages: {
          usertype: {
            required: "Please select a usertype",
          },
          name: {
            required: "Please enter a name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Your password must be at least 6 characters long"
          },
          password2: {
            required: "Please enter a confirm password",
            equalTo: "Confirm password doesn't match"
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
