@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle card-drop"  aria-expanded="false">
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

                <h4 class="header-title m-t-0 m-b-30">Items type</h4>


                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>type</th>
                            <th>number</th>
                            <th>show book</th>

                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>Book</td>
                                <td><span class="badge badge-danger">{{$books}}</span></td>
                                <td><a href="{{url('admin/item/book')}}"><span class="label label-default">show books</span></td>
                                <td><a href="{{url('admin/item/book/add')}}"><span class="label label-purple">Add new book</span></a></td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->

    </div>



@endsection

