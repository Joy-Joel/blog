@extends('layout.master')
@section('title','Hyper Title')
@section('content')

@if($errors->all())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endforeach
@endif

@if(session('status'))
<div>
    {{session('status')}}
</div>
@endif
<form method="POST" action="{{route('upload.profile')}}" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="image">Choose an image</label>
        <input type="file" id="image" name="profile_picture">
        <button type="submit" class="btn btn-default">Upload</button>
    </div>
</form>
    <img src="/storage/upload/{{Auth::user()->profile_picture}}" alt="profile">
@endsection