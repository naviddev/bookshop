@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row form-c z-depth-1 ">
            <h5> ثبت نام <i class="material-icons prefix" style="  float: right;font-size: 28px;line-height: 1px;">assignment_ind</i></h5>
            <form class="col s12" method="post" action="{{url('register')}}">
                {{csrf_field()}}
                <div class="row ">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="LastName"
                               value="{{old('LastName')}}">
                        <label for="icon_prefix" class="active">نام خانوادگی* </label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="FirstName"
                               value="{{old('FirstName')}}">
                        <label for="icon_prefix">نام *</label>
                    </div>

                    <div class="input-field col s6 radio-btn">
                        <i class="material-icons prefix">supervisor_account</i>

                        <p>
                            <input type="radio" id="test1" value="1" name="gender"/>
                            <label for="test1">مرد</label>
                        </p>
                        <p>
                            <input type="radio" id="test2" value="0" name="gender"/>
                            <label for="test2">زن</label>
                        </p>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="text" class="validate" name="email"
                               value="{{old('email')}}">
                        <label for="icon_prefix">ایمیل</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_prefix" type="password" class="validate" name="password_confirmation"
                               value="">
                        <label for="icon_prefix">تکرار رمز *</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_prefix" type="password" class="validate" name="password"
                               value="">
                        <label for="icon_prefix">رمز (حداقل 6 رقم)</label>
                    </div>
                    @foreach ($errors->all() as $message)
                        {{'* '.$message}}
                    @endforeach
                    <div class="col s12 error"></div>

                    <button class="btn waves-effect waves-light left submit-btn" type="submit" name="action">ثبت نام
                        <i class="material-icons left">mode_edit</i>
                    </button>


            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('input#input_text, textarea#textarea1').characterCounter();
        });
    </script>
@endsection