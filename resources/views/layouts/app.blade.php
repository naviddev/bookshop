<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{url('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet">
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <script src="{{url('js/materialize.min.js')}}"></script>
    <script src="{{url('js/main.js')}}
   ">

    </script>
    <script>
var $url= '{{url('')}}';
        $(document).ready(function(){
            $('.modal-trigger').leanModal();
        });
    </script>

    @yield('header')
</head>
<body>
<div id="top-main-nav">
    <div class="container">
        <nav>
            <div class="nav-wrapper white ">

                <div id="top-side-menu" class="z-depth-1 right"><a href=""><h1>من</h1>
                        <h1 class="black-text">فروشگاه</h1></a>
                    @if(Request::url() === url(''))
                        <ul id="top-side-nav">
                            <li><a class="side-li-1" href="">کتاب ها</a>

                            </li>
                            <li><a class="side-li-2" href="">مقالات</a></li>
                            <li><a class="side-li-3" href="">همایش ها</a></li>
                            <li><a class="side-li-4" href="">اعضا</a></li>
                            <li><a class="side-li-5" href="">ارتباط با ما</a></li>
                        </ul>
                    @endif
                </div>
                <ul class="right">
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>

                </ul>

                    @if(auth()->guard('user')->guest())<div class="sighup-btn"><a href="{{url('register')}}">ثبت نام</a><a href="#modal1" class="modal-trigger" data-target="#modal1" >ورود</a>   </div>
                        @else
                       <div class="user-status"> خوش آمدید <a href="{{url('/logout')}}"  class="logout" >خروج</a>{{auth()->guard('user')->user()->FirstName}} <div class="basket">
                               <a href=""><i class="material-icons prefix">shopping_basket</i> </a>({{basket_count_get(auth()->guard('user')->user()->id)}}) </div></div>
                    @endif

            </div>
        </nav>
    </div>
    <div class="container">

    </div>
</div>
@if(Request::url() ===url(''))
    <div class="res-slide">
<div id="slider" class="container">
    <ul class="rslides">
        <li><img src="{{url('img/nature-05.jpg')}}" alt=""></li>
        <li><img src="{{url('img/nature-05.jpg')}}" alt=""></li>
        <li><img src="{{url('img/nature-05.jpg')}}" alt=""></li>
    </ul>
</div>
    </div>
@endif
<div id="recent-post" class="container">
    <div class="recent-post-title"><a href="" class="waves-effect waves-light btn">بیشتر</a><h4>کتاب های اخیر</h4>
    </div>
   <?php $books=recent_book();?>
    @foreach($books as $book)
        <a href="{{url('book/'.$book->id)}}"><div class="recent-post-block"><img src="Asphalt_8_icon.png" alt="">
                <h2>{{$book->title}}</h2>
                <h3>{{$book->detail}}</h3>
                <div class="star">
                    <i class="material-icons star-icon active-star">star_rate</i>
                    <i class="material-icons star-icon active-star">star_rate</i>
                    <i class="material-icons star-icon active-star">star_rate</i>
                    <i class="material-icons star-icon ">star_rate</i>
                    <i class="material-icons star-icon ">star_rate</i>
                </div>
                <div class="add-basket"><i class="material-icons add_shoping" href="{{$book->id}}" >add_shopping_cart</i></div>
            </div></a>
    @endforeach

</div>


<!-- Modal Structure -->
<div id="modal1" class="modal" style="height: 500px;">
    <div class="modal-content">
        <div class="panel panel-filled">
            <div class="panel-body">
                <form action="{{url('/login')}}" method="POST" id="loginForm" novalidate>
                    <div class="form-group" id="email-div">
                        {{ csrf_field() }}
                        <label class="control-label" for="email">ایمیل</label>
                        <input id="email" type="email" placeholder="example@gmail.com" title="لطفا ایمیل خود را وارد کنید" required value="" name="email" class="form-control">
                        {{-- <div id="form-errors-email" class="has-error"></div> --}}
                        <span class="help-block">
                                <strong id="form-errors-email"></strong>
                            </span>

                    </div>
                    <div class="form-group" id="password-div">
                        <label class="control-label" for="password">رمز عبور</label>
                        <input type="password" title="Please enter your password" placeholder="******" required value="" name="password" id="password" class="form-control">
                        <span class="help-block">
                                <strong id="form-errors-password"></strong>
                            </span>

                    </div>
                    <div class="form-group" id="login-errors">
                            <span class="help-block">
                                <strong id="form-login-errors"></strong>
                            </span>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">

                        </div>
                    </div>

                    <div>
                        <button class="btn btn-login right">ورود</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@yield('content')
@yield('footer')
