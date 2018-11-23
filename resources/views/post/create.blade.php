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
<form method="post" class="mt-4" >
@csrf

    <div>
        Title <input type="text" name="title" class="mt-3 mb-3">
    </div>
    <div>
       <strong> Content </strong><textarea name="content" id="" rows="4" class=></textarea>
    </div>
    <div>
         <input type="Submit" role="button" class="mt-5 btn btn-success">
    </div>
</form>


@endsection