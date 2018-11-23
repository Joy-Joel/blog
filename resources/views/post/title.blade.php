@extends('layout.master')
@section('title','Hyper Title ')
@section('content')

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{URL('post/view_blog')}}" role="button">View All Blogs</a>
    </div>
    
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{URL('post/create')}}" role="button">New Blog</a>
    </div>
</div>
<div style="panel panel-default">
    @foreach($posts as $post)
    <div class="media media-default">
        <div class="media-heading">
    <a href="{{route('details',$post->id)}}">{{$post->title}}</a>
    </div>
        </div>
    @endforeach
</div>  

@endsection