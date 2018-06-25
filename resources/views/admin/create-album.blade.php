@extends('layouts.app')

@section('header')
    <h3 class="mb-3">Create Property</h3>
    <div class="form-group row p-4">
        {!! Form::open(['action' => 'ProjectsController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            {{Form::text('name', '',['placeholder'=> 'Property Name', 'class'=>'form-control mb-3'])}}
            {{Form::text('location', '',['placeholder'=> 'Property Location', 'class'=>'form-control mb-3'])}}
            {{Form::textarea('description','',['placeholder'=> 'Property Description','class'=>'form-control mb-3'])}}
            <label for=$name>PDF for Proprty (save pdf as image)</label>
            <div class="custom-file mb-3">
                {{Form::file('cover_image',['class'=>'form-control-file', 'id'=>'customFile'])}}
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            {{form::submit('submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection

@section('content')
    <div class="d-flex align-content-around flex-wrap">
        @if(count($albums) > 0)

            @foreach($albums as $album)
                <div class="card bg-light mb-4 gallery-card mx-4" style="width: 35rem;">
                    <img class="card-img-top" src="../storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                    <div class="card-body">
                    <h5 class="card-title">{{$album->name}}</h5>
                    <p class="card-text">{!!$album->description!!}</p>
                    <a href="/admin/albums/{{$album->id}}" class="card-link">Edit</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection