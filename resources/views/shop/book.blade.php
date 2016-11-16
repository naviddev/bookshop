@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row z-depth-1 book-box">
            <div class="col s8 push-s4 book"><span class="flow-text"><img src="{{url('img/harrypotter.jpg')}}" alt="">
            <h1>{{$book->title}}</h1><h2>{{$book->detail}}</h2><p>{{$book->body}}</p></span>
            </div>
            <div class="col s4 pull-s8 plan" style="padding: 10px 60px;"><span class="flow-text"><p>نویسنده:بیب</p><p>سال انتشار:یبیببییب</p><h5 style="text-decoration: line-through; color: red"> تومان {{$book->price}}</h5><h5>15.000 تومان</h5><a class="waves-effect waves-light btn" href="{{url('user/shopping/add/'.$book->id)}}">خرید</a></span>
            </div>
        </div>
    </div>

@endsection