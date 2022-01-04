@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Password</li>
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
                    <h3>Edit Password</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{route('profiles.change-password.update')}}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label class="current_password">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="again_new_password">Again New Password</label>
                                    <input type="password" name="again_new_password" id="again_new_password" class="form-control" placeholder="Again New Password">
                                </div>
                            </div>
                            <div class="col-3" style="padding-top: 30px;">
                                <input type="submit" value="Update" class="btn btn-primary">
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
      $('#myForm').validate({
        rules: {
         current_password: {
              required: true,
          },
          new_password: {
              required: true,
              minlength: 6
          },
          again_new_password: {
            required: true,
            equalTo: '#new_password'
          },
        },
        messages: {
          current_password: {
            required: "Please enter Current password",
          },
          new_password: {
            required: "Please enter new password",
            minlength: "Your password must be at least 6 characters long"
          },
          again_new_password: {
            required: "Please enter again new password",
            equalTo: "Again password doesn't match"
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
