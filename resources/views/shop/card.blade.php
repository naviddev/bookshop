@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-1 white card">
                <div><img src="{{url('img/harrypotter.jpg')}}" alt=""></div>
                {{--<div class="detail"><h1 class="">{{$book->title}}</h1><h2 class="">{{$book->detail}}</h2><div ></div></div>--}}
    </div>
            <div class="col s12 z-depth-1 white buy">
{{--                <a class="waves-effect waves-light btn"  href="{{url('user/shopping/add/'.$book->id)}}">تکمیل خرید</a>--}}
                </div>
    </div>
    </div>
@foreach($book as $car)
    {{$car}}
    @endforeach
    @endsection