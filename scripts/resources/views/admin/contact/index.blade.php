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
                    <h3>Contact List</h3>
                    @if ($countContact<1)
                    <button class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus-circle">Add Contact</i></button>
                    @endif
                    <!--Create Modal--->
                    <div class="modal fade" id="basicModal">
                        <div style="color: #000" class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Contact</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('contacts.store') }}" id="myForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="address">Address</label>
                                            <input type="address" name="address" id="address" value="{{old('address')}}" class="form-control" placeholder="Address">
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
                                            <label class="facebook">Facebook</label>
                                            <input type="facebook" name="facebook" id="facebook" value="{{old('facebook')}}" class="form-control" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <label class="twitter">Twitter</label>
                                            <input type="twitter" name="twitter" id="twitter" value="{{old('twitter')}}" class="form-control" placeholder="Twitter">
                                        </div>
                                        <div class="form-group">
                                            <label class="youtube">Youtube</label>
                                            <input type="youtube" name="youtube" id="youtube" value="{{old('youtube')}}" class="form-control" placeholder="Youtube">
                                        </div>
                                        <div class="form-group">
                                            <label class="youtube">LinkedIn</label>
                                            <input type="" name="linkedin" id="linkedin" value="{{old('linkedin')}}" class="form-control" placeholder="LinkedIn">
                                        </div>
                                        <div class="form-group">
                                            <label class="google_plus">Google Plus</label>
                                            <input type="google_plus" name="google_plus" id="google_plus" value="{{old('google_plus')}}" class="form-control" placeholder="Google Plus">
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
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>YouTube</th>
                                <th>LinkedIn</th>
                                <th>Google Plus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$contact)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->mobile_no}}</td>
                                <td>{{$contact->facebook}}</td>
                                <td>{{$contact->twitter}}</td>
                                <td>{{$contact->youtube}}</td>
                                <td>{{$contact->linkedin}}</td>
                                <td>{{$contact->google_plus}}</td>
                                <td>
                                    <a title="Edit" href="{{route('contacts.edit',$contact->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                    {{-- <a title="Delete" class="btn btn-sm btn-danger" href="{{route('contacts.delete',$contact->id)}}" id="delete"><i class="fa fa-trash"></i></a> --}}
                                    <a title="Delete" href="{{route('contacts.delete',$contact->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
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
          email: {
            required: true,
            email: true,
          },
          mobile_no: {
              required: true,
          },
          facebook: {
            required: true,
          },
          twitter: {
              required: true,
          },
          youtube: {
            required: true,
          },
          linkedin: {
            required: true,
          },
          google_plus: {
              required: true,
          }


        },
        messages: {
          address: {
            required: "Please enter a address",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          mobile_no: {
            required: "Please enter a mobile number",
          },
          facebook: {
            required: "Please enter a facebook link",
          },
          twitter: {
            required: "Please enter a twitter link",
          },
          youtube: {
            required: "Please enter a youtube",
          },
          linkedin: {
            required: "Please enter a youtube",
          },
          google_plus: {
            required: "Please enter a google plus",
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
