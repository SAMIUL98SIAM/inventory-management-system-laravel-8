@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
            <section class="col-md-4 offset-md-4">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3>Profile</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{!empty($user->image)?url('/scripts/public/upload/user_image/'.$user->image):url('/upload/no_image.jpg/')}}" alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center">{{$user->name}}</h3>

                          <p class="text-muted text-center">{{$user->address}}</p>
                          <table width="100%" class="table table-bordered">
                              <tbody>
                                  <tr>
                                      <td><b>Mobile No:</b></td>
                                      <td>{{$user->mobile}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Email:</b></td>
                                    <td>{{$user->email}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Gender:</b></td>
                                    <td>{{$user->gender}}</td>
                                </tr>
                              </tbody>
                          </table>
                          <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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
