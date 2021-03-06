@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Customer</li>
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
                    <h3>customer List</h3>
                    <button class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus-circle">Add Customer</i></button>
                    <!--Create Modal--->
                    <div class="modal fade" id="basicModal">
                        <div style="color: #000" class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('customers.store') }}" id="myForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="name">Customer Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="customer Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="mobile_no">Mobile No</label>
                                            <input type="mobile_no" name="mobile_no" id="mobile_no" value="{{old('mobile_no')}}" class="form-control" placeholder="Mobile No">
                                        </div>
                                        <div class="form-group">
                                            <label class="email">Email</label>
                                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="address">Address</label>
                                            <input type="address" name="address" id="address" value="{{old('address')}}" class="form-control" placeholder="Address">
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
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$customer)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->mobile_no}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->created_by}}</td>
                                <td>{{$customer->updated_by}}</td>
                                <td>
                                    <button title="Edit" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-edit"></i></button>
                                    {{--Edit Modal--}}
                                    <div style="color: #000" class="modal fade" id="editModal{{ $key }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('customers.update',$customer->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label class="package_name">Customer Name</label>
                                                            <input type="text" name="name" class="form-control" required="" value="{{ $customer->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="mobile_no">Mobile No</label>
                                                            <input type="mobile_no" name="mobile_no" id="mobile_no" value="{{$customer->mobile_no}}" class="form-control" placeholder="Mobile No">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="amount">Email</label>
                                                            <input type="email" name="email" class="form-control" required="" value="{{ $customer->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="address">Address</label>
                                                            <input type="address" name="address" class="form-control" required="" value="{{ $customer->address }}">
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

                                    <a title="Delete" href="{{route('customers.delete',$customer->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
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
