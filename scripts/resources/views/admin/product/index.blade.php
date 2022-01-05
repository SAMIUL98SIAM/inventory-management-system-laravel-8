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
                    <h3>product List</h3>
                    <button class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus-circle">Add Product</i></button>
                    <!--Create Modal--->
                    <div class="modal fade" id="basicModal">
                        <div style="color: #000" class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create product</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('products.store') }}" id="myForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="category_id">Select Category</label>
                                            <select name="category_id" id="category_id" class="form-control form-control-sm">
                                                <option value="">Select category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="unit_id">Select Unit</label>
                                            <select name="unit_id" id="unit_id" class="form-control form-control-sm">
                                                <option value="">Select Unit</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="supplier_id">Select Supplier</label>
                                            <select name="supplier_id" id="supplier_id" class="form-control form-control-sm">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="name">product Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Product Name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Create Modal/--->
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Supplier</th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->supplier->name}}</td>
                                <td>{{$product->unit->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->created_by}}</td>
                                <td>{{$product->updated_by}}</td>
                                <td>
                                    <button title="Edit" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></button>
                                    {{--Edit Modal--}}
                                    <div style="color: #000" class="modal fade" id="editModal{{ $key }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('products.update',$product->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label class="category_id">Select Category</label>
                                                            <select name="category_id" id="category_id" class="form-control form-control-sm">
                                                                <option value="">Select category</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" {{(@$product->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="unit_id">Select Unit</label>
                                                            <select name="unit_id" id="unit_id" class="form-control form-control-sm">
                                                                <option value="">Select Unit</option>
                                                                @foreach($units as $unit)
                                                                    <option value="{{$unit->id}}" {{(@$product->unit_id==$unit->id)?'selected':''}}>{{$unit->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="supplier_id">Select Supplier</label>
                                                            <select name="supplier_id" id="supplier_id" class="form-control form-control-sm">
                                                                <option value="">Select supplier</option>
                                                                @foreach($suppliers as $supplier)
                                                                    <option value="{{$supplier->id}}" {{(@$product->supplier_id==$supplier->id)?'selected':''}}>{{$supplier->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="name">product Name</label>
                                                            <input type="text" name="name" class="form-control" required="" value="{{ $product->name }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Edit Modal /--}}

                                    <a title="Delete" href="{{route('products.delete',$product->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
         supplier_id: {
              required: true,
          },
          name: {
              required: true,
          },
          category_id: {
            required: true,
          },
          unit_id: {
            required: true,
          }
        },
        messages: {
          supplier_id: {
            required: "Please enter an supplier name",
          },
          name: {
            required: "Please enter a name",
          },
          category_id: {
            required: "Please enter a category name",
          },
          unit_id: {
            required: "Please enter a unit name",
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
