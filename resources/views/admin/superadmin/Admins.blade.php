@extends('admin.layouts.app')
@section('header')
    <link href="{{url('assets/plugins/toastr/toastr.min.css')}}}" rel="stylesheet" type="text/css">
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
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

                <h4 class="header-title m-t-0 m-b-30">Admins List</h4>


                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>phone</th>
                            <th>log</th>
                            <th>email</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admin as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->lastName}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td><a href="{{url('admin/admins/remove/'.$item->id)}}"><span class="label label-danger">Remove</span></a></td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->

    </div>



    @endsection
@section('footer')
    <script src="{{url('assets/plugins/toastr/toastr.min.js')}}"></script>
    <script >


@if(Session::has('flash_message'))

        toastr["{{Session::get('flash_message_type')}}"]("{{Session::get('flash_message')}}")

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
        @endif



    </script>
    @endsection