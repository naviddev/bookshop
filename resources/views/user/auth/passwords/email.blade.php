@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row form-c z-depth-1 ">
            <h5> ثبت نام <i class="material-icons prefix" style="  float: right;font-size: 28px;line-height: 1px;">assignment_ind</i></h5>
            <form class="col s12" method="post" action="{{ url('/user/password/email') }}">
                {{csrf_field()}}
                <div class="row ">
                    <div class="input-field col s6 right" style="margin-right: 33px;">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="text" class="validate" name="email"
                               value="{{old('email')}}">
                        <label for="icon_prefix" class="active">ایمیل* </label>
                    </div>


                    @foreach ($errors->all() as $message)
                        {{'* '.$message}}
                    @endforeach
                    <div class="col s12 error"></div>

                    <button class="btn waves-effect waves-light left submit-btn" type="submit" name="action">درخواست
                        <i class="material-icons left">mode_edit</i>
                    </button>


            </form>
        </div>
    </div>
@endsection
