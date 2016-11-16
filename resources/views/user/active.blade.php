@extends('layouts.app')
@section('content')

    <div class="container active-error" >
        <div class="row form-c z-depth-1" >
            <div class="active-message"> <p>شما باید اکانت خود را فعال کنید</p>
                <p>ما لینک فعال سازی را به ایمیل شما ارسال کردیم</p>
                <p>اگر ایمیلی دریافت نکردی <a href="">اینجا کلیک کنید</a></p></div>

            <div class="resend-form">
                <p>برای ارسال دوباره ایمیل آدرس ایمیل خودرا وارد کنید</p>
                <form action="{{url('register/verify/resend')}}" method="post" style="width: 500px;text-align: center;">
                    {{csrf_field()}}
                    <input type="text" name="email" placeholder="ایمیل"/>
                    <input type="submit"  name="submit" id="submit"/>
                </form>
                @foreach ($errors->all() as $message)
                    {{'* '.$message}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script >jQuery(document).ready(function ($) {
            $('.active-error').one('click', function (e) {
                e.preventDefault();
                $('.active-message').css('display', 'none');
                $('.resend-form').css('display', 'block');
            })
        })
    </script>
    @endsection
