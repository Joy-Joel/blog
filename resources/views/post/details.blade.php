@extends('layout.master')
@section('title','Hyper Title ')
@section('content')

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary mb-3" href="{{URL('post/view_blog')}}" role="button">View All Blogs</a>
    </div>
    <div class="col-md-4">
    <a class="btn btn-primary" href="{{URL('post/title')}}" role="button">Title Blog</a>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{URL('post/create')}}" role="button">New Blog</a>
    </div>
</div>

<div style="margin:0 auto;">

    <div class="panel panel-default">
        <div class="panel-heading">
            {{$post->title}}
        </div>
        <div class="panel-heading">
            {{$post->content}}
        </div>
        <div class="panel-heading">
            {{$post->user->name}} --- created at{{$post->created_at}}
        </div>
       
        <a href="{{route('edit',$post->id)}}">Edit</a>
        <a href="{{route('delete',$post->id)}}">Delete</a>
    </div>
    <br>

    <!-- codes for viewing all the comments made in a blog!-->

        <h3>Display All Comments</h3>
        @foreach($post->comment as $comments)
            <div class="panel panel-default">
                <div class="panel-body">
                    {{$comments->comment}}
                </div>
                <div class="panel-footer">
                   <strong> Comment by </strong>{{$comments->name}}
                </div>
            </div> 
        @endforeach
<!-- code for checking errors-->
    <div>
    @if(count($errors->all()) >=1)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}</div>
        @endforeach
    @endif
<!-- code for ensuring that success token is displayed -->
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
<!-- code for post -->
        <form action="{{route('post.comment')}}" method="POST">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="name" ></label>
                <input class="form-control" name="name" placeholder="name">
                
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input  class="form-control" name="email" placeholder="Email">
            </div>  
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><h3>Comment:</h3></label>
                <textarea class="form-control" name="comments" rows="3"></textarea>
            </div>     
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
        
    </div>
</div>


@endsection