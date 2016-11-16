@extends('admin.layouts.app')
@section('header')
    <link href="{{url('assets/plugins/fileuploads/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-10">
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

                <h4 class="header-title m-t-0 m-b-30">Add New Book</h4>

                <form action="{{url('admin/item/book/add')}}" method="post" data-parsley-validate novalidate>
                    {{csrf_field()}}
                    <div class="form-group">
                        {{$errors->has('title') ? ' has-error' : '' }}
                        <label for="title"> title*</label>
                        <input type="text" name="title" parsley-trigger="change" required
                               placeholder="Enter  title" class="form-control" id="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('detail') ? ' has-error' : '' }}
                        <label for="lastName">detail*</label>
                        <input type="text" name="detail" parsley-trigger="change" required
                               placeholder="Enter  detail" class="form-control" id="detail" value="{{ old('detail')}}">
                    </div>

                    <div class="form-group">
                        {{ $errors->has('link') ? ' has-error' : '' }}
                        <label for="phone">link*</label>
                        <input type="text" name="link" parsley-trigger="change" required
                               placeholder="Enter link" class="form-control" id="link" value="{{ old('link')}}">
                    </div>
                    <div class="form-group">
                        {{ $errors->has('price') ? ' has-error' : '' }}
                        <label for="price">price*</label>
                        <input type="text" name="price" parsley-trigger="change" required
                               placeholder="Enter price" class="form-control" id="price" value="{{ old('price')}}">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">

                                    <textarea id="elm1" name="body"></textarea>

                            </div>
                        </div><!-- end col -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0 m-b-30">picture</h4>

                                    <input type="file" name="pic" class="dropify"  />
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
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
    <script src="{{url('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
{{--    <script src="{{url('assets/plugins/fileuploads/js/dropify.min.js')}}"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    </script>
@endsection
