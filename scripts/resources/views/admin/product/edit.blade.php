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
                    <h3>Edit Product</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"> Product List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('products.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-4">
                                    <label class="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{(@$editData->brand_id==$brand->id)?'selected':''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="name">Product Name</label>
                                    <input type="text" name="name" value="{{$editData->name}}" class="form-control form-control-sm" id="name" placeholder="Write Product name">
                                </div>
                                <div class="col-6">
                                    <label class="color_id">Color</label>
                                    <select name="color_id[]" id="color_id" class="form-control select2 form-control-sm" multiple>
                                        <option value="">Select Color</option>
                                        @foreach($colors as $color)
                                            <option  value="{{$color->id}}" {{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}}>{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="size_id">Size</label>
                                    <select name="size_id[]" id="size_id" class="form-control select2 form-control-sm" multiple>
                                        <option  value="">Select Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="short_desc">Short Description</label>
                                    <textarea name="short_desc" id="short_desc" class="form-control">{{$editData->short_desc}}</textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="long_desc">Long Description</label>
                                    <textarea name="long_desc" id="long_desc" class="form-control">{{$editData->long_desc}}</textarea>
                                </div>
                                <div class="col-4">
                                    <label class="price">Price</label>
                                    <input type="number" name="price" value="{{$editData->price}}" class="form-control form-control-sm" id="price" placeholder="Write Product Price">
                                </div>
                                <div class="col-4">
                                    <label class="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                                <div class="col-4" style="padding-top: 10px;">
                                    {{-- <img id="showImage" src="{{url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:150px; height:160px; border:1px solid #000;"> --}}
                                    <img id="showImage" src="{{!empty($editData->image) ? url('/scripts/public/upload/product_image/'.$editData->image):url('/upload/no_image.jpg')}}" height="150px" width="200px;" alt="Card image cap"/>
                                </div>
                            </div>
                            <div class="col-2" style="padding-top: 30px;">
                                <input type="submit" value="Submit" class="btn btn-primary">
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

@section('scripts')
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

});
</script>

@endsection
