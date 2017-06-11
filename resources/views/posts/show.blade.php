@extends('layouts.app')

@section('body')
    <h1><a href="{{route('posts.edit',$posts->id)}}">{{$posts->title}}</a></h1>


@endsection
@yield('footer')