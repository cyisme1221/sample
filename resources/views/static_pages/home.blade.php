@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>

    <p class="lead">
        Learn Laravel At <a href="https://laravel.com">Laravel</a> 's Home Page
    </p>
    <p>
        Let's start it!
    </p>
    <p>
        <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button" > Register Now</a>
    </p>
    </div>
@stop
