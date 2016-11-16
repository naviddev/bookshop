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

                <h4 class="header-title m-t-0 m-b-30">books</h4>


                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>detail</th>
                            <th>sold</th>
                            <th>price</th>
                            <th>edit</th>

                        </tr>
                        </thead>
                        <tbody>
@foreach($books as $book)
                        <tr>
                            <th scope="row">{{$book->id}}</th>
                            <td>{{$book->title}}</td>
                            <td>{{$book->detail}}</td>
                            <td>{{$book->sold}}</td>
                            <td>{{$book->price}}</td>
                            <td><a href="{{url('admin/item/book/edit/'.$book->id)}}"><span class="label label-warning">edit</span></a></td>


                        </tr>
@endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->

    </div>



@endsection


