@extends('layouts.app')
@section('header')

    <script src="{{url('js/responsiveslides.min.js')}}"></script>
    @endsection
@section('content')


<div id="last_post" class="container  row">
    <div class="col s6 main-post-block"><img src="unnamed.png" alt="">
        <div class="post-detail"><h1>اموزش زبان برنامه نویس </h1>
            <h2>مقاله درباره اموزش برنامه ویس در زبان c وغیره ویامیببیب</h2>
            <div class="star">
                <i class="material-icons star-icon active-star ">star_rate</i>
                <i class="material-icons star-icon active-star">star_rate</i>
                <i class="material-icons star-icon active-star">star_rate</i>
                <i class="material-icons star-icon ">star_rate</i>
                <i class="material-icons star-icon ">star_rate</i>
            </div>
            <a href="" class="waves-effect waves-light btn">بیشتر</a>
        </div>
    </div>
    <div class="col s6 main-post-block" style="margin-left: 41px;"><img src="unnamed.png" alt="">
        <div class="post-detail"><h1>اموزش زبان برنامه نویس </h1>
            <h2>مقاله درباره اموزش برنامه ویس در زبان c وغیره ویامیببیب</h2>
            <div class="star">
                <i class="material-icons star-icon active-star ">star_rate</i>
                <i class="material-icons star-icon active-star">star_rate</i>
                <i class="material-icons star-icon active-star">star_rate</i>
                <i class="material-icons star-icon ">star_rate</i>
                <i class="material-icons star-icon ">star_rate</i>
            </div>
            <a href="" class="waves-effect waves-light btn">بیشتر</a>
        </div>
    </div></div>


<footer class="page-footer  blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

</body>
</html>
@endsection()
@section('footer')
    <script>
        $(function() {
            $(".rslides").responsiveSlides();
        });
    </script>
    @endsection