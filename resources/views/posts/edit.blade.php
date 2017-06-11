@extends('layouts.app')

@section('body')
<h1>edit post</h1>
    {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post',['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}
        </div>

{!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}

{!! Form::submit('Delete Post',['class'=>'btn btn-info']) !!}
{!! Form::close() !!}


@endsection
@yield('footer')