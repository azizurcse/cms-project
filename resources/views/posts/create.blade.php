@extends('layouts.app')

@section('body')

    {!! Form::open(['method'=>'POST','action'=>'PostController@store','enctype'=>'multipart/form-data']) !!}

        {{csrf_field()}}

    <div class="form-group">
        {!! Form::file('image',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
     </div>
    {!! Form::close() !!}


    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>
    @endif


    @endsection
    @yield('footer')