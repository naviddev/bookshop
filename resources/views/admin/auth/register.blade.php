@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <div class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>

                <h4 class="header-title m-t-0 m-b-30">Add New Admin</h4>

                <form action="{{url('admin/admins/add')}}" method="post" data-parsley-validate novalidate>
                    {{csrf_field()}}
                    <div class="form-group">
                        {{$errors->has('name') ? ' has-error' : '' }}
                        <label for="name"> Name*</label>
                        <input type="text" name="name" parsley-trigger="change" required
                               placeholder="Enter admin name" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('lastName') ? ' has-error' : '' }}
                        <label for="lastName">Last Name*</label>
                        <input type="text" name="lastName" parsley-trigger="change" required
                               placeholder="Enter admin lastName" class="form-control" id="lastName" value="{{ old('lastName')}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('phone') ? ' has-error' : '' }}
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" parsley-trigger="change" required
                               placeholder="Enter admin phone" class="form-control" id="phone" value="{{ old('phone')}}">
                    </div>
                    <div class="form-group"  >
                        {{ $errors->has('email') ? ' has-error' : '' }}
                        <label for="emailAddress">Email address*</label>
                        <input type="email" name="email" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress" value="{{ old('email')}}">
                    </div>

                    <div class="form-group">
                        {{ $errors->has('password') ? ' has-error' : '' }}
                        <label for="pass1">Password*</label>
                        <input id="pass1" type="password" placeholder="Password" required name="password"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="passWord2">Confirm Password *</label>
                        <input data-parsley-equalto="#pass1" type="password" required name="password_confirmation"
                               placeholder="Password" class="form-control" id="passWord2">
                    </div>

                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                            Cancel
                        </button>
                    </div>

                </form>
                @foreach ($errors->all() as $message)
                    {{'* '.$message}}
                @endforeach
            </div>
        </div><!-- end col -->


    </div>
    <!-- end row -->


    <script>
        var resizefunc = [];
    </script>

@endsection
@section('footer')
    <script type="text/javascript" src="{{url('assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
    @endsection
