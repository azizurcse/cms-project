@extends('layouts.app')

@section('body')

    @foreach($posts as $post)
        <li><a href="{{'/posts/'.$post->id}}">{{$post->title}}</a></li>
    @endforeach


@endsection
@yield('footer')