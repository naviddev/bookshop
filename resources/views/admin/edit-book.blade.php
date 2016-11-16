@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
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

                <h4 class="header-title m-t-0 m-b-30">Edit Book</h4>

                <form action="{{url('admin/item/book/edit/'.$book->id)}}" method="post" data-parsley-validate novalidate>
                    {{csrf_field()}}
                    <div class="form-group">
                        {{$errors->has('title') ? ' has-error' : '' }}
                        <label for="title"> title*</label>
                        <input type="text" name="title" parsley-trigger="change" required
                               class="form-control" id="title" value="{{ $book->title}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('detail') ? ' has-error' : '' }}
                        <label for="lastName">detail*</label>
                        <input type="text" name="detail" parsley-trigger="change" required
                                class="form-control" id="detail" value="{{ $book->id}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('body') ? ' has-error' : '' }}
                        <label for="phone">body*</label>
                        <input type="text" name="body" parsley-trigger="change" required
                                class="form-control" id="body" value="{{ $book->body}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('link') ? ' has-error' : '' }}
                        <label for="phone">link*</label>
                        <input type="text" name="link" parsley-trigger="change" required
                                class="form-control" id="link" value="{{ $book->link}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('price') ? ' has-error' : '' }}
                        <label for="price">price*</label>
                        <input type="text" name="price" parsley-trigger="change" required
                                class="form-control" id="price" value="{{ $book->price}}">
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
