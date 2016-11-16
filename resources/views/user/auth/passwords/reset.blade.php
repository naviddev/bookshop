@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row form-c z-depth-1 ">
        <h5> بازیابی رمز عبور <i class="material-icons prefix" style="  float: right;font-size: 28px;line-height: 1px;">assignment_ind</i></h5>
        <form class="col s12" method="post" action="{{ url('/user/password/reset') }}">
            {{csrf_field()}}
            <div class="row ">
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_prefix" type="password" class="validate" name="password"
                           value="">
                    <label for="icon_prefix">رمز (حداقل 6 رقم)</label>
                </div>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="text" class="validate" name="email"
                           value="{{ $email or old('email') }}">
                    <label for="icon_prefix">ایمیل</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_prefix" type="password" class="validate" name="password_confirmation"
                           value="">
                    <label for="icon_prefix">تکرار رمز *</label>
                </div>

                @foreach ($errors->all() as $message)
                    {{'* '.$message}}
                @endforeach
                <div class="col s12 error"></div>

                <button class="btn waves-effect waves-light left submit-btn" type="submit" name="action">ثبت
                    <i class="material-icons left">mode_edit</i>
                </button>


        </form>
    </div>
</div>
@endsection
