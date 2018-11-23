@extends('layout.master')
@section('title','Add post')
@section('content')

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{URL('post/view_blog')}}" role="button">View All Blogs</a>
    </div>
    <div class="col-md-4">
    <a class="btn btn-primary" href="{{URL('post/title')}}" role="button">Title Blog</a>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{URL('post/create')}}" role="button">New Blog</a>
    </div>
</div>
<table class="table table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>user_id</th>
            <th>title</th>
            <th>content</th>
            <th>Date created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($post as $post)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->title}}</a></td>
            <td>{{$post->content}}</td>
            <td>{{$post->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection