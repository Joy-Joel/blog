@extends('layout.master')
@section('title','Edit Post')
@section('content')




<form  method="POST">
@csrf
    <div>
        Title <input type="text" name="title" value="{{$post->title}}"/>
    </div>
    <br>
    <div>
    Content  <textarea name="content" id="" rows="4" value="{{$post->content}}"></textarea>
    </div>
    <br><br>
    <input type="submit" class="btn btn-primary ml-3" value="Update"  />


@endsection