<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\CommentRequest;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;
use Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    

    
   public function store(CommentRequest $request)
   {
       //dd($request->all());
       $comment=new Comment;
          $comment->comment= $request ->get('comments');
          $comment->name=$request ->get('name');
          $comment->email=$request ->get('email');
          $comment->post_id=$request ->post_id;  
        $comment->save();
         return redirect()->back()->with('status','You have Successully Uploaded Your Comment');
    }

}
