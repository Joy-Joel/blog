@extends('layout.master')
@section('title','Edit Comment')
@section('content')




<form  method="POST">
@csrf
    <div>
        title <input type="text" name="title" value="{{$post->title}}"/>
    </div>
    <div>
        content <input type="textarea" name="content" id="" rows="4" value="{{$post->content}}"></textarea>
    </div>
   
    <input type="submit" class="btn btn-primary" value="Update" />


@endsection