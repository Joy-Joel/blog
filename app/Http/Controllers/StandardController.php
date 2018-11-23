<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class StandardController extends Controller
{
    public function index(){
        return view('pages.index');

     }

    public function services(){
        return view('pages.services');
    }

    public function homepage(){
        $names="Thank you God";
    return view('mine',compact('names')); 
    }  
    public function name($name){
        return "This is my name ".$name;
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(PostRequest $request)
    {
       $id=Auth::user()->id;
       $post=new Post([
           'title'=>$request->title,
           'content'=>$request->content,
           'user_id'=>$id
           
       ]);
       $post->save();
       return redirect()->back();
    }
    public function view(){
        $post=post::all();
        return view('post.view_blog',compact('post'));
    }
    public function title(){
        $posts=Post::all();
        return view('post.title',compact('posts'));
    }

    public function detail($id){
        $post=Post::whereId($id)->first();
        return view('post.details',compact('post'));
    }
    
//code for the edit blade
    public function edit($id){
        $post=Post::find($id);
        return view('post.edit', compact('post'));
    }

//code for the update method using C.R.U.D method
    public function update(PostRequest $request, $id){

        $post=Post::whereId($id)->first();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return redirect('/post/view_blog');

    }

  public function delete($id){
      $post=Post::find($id);
      $post->delete();

     return redirect('/post/title')->with('success', 'Stock has been deleted Successfully'); 
  }
  public function uploadprofile(Request $request){
    //  dd($request->file('profile_picture')->getClientOriginalName());
      $this->validate($request, [
          'profile_picture'=> 'required|mimes:jpg,png,gif,svg,psd|max:2048'
      ]);
      //getting the picture/file together with the extension
      $filename=$request->file('profile_picture')->getClientOriginalName();
      

      //getting the picture/file name without the extension
      $ext=pathinfo($filename, PATHINFO_FILENAME);
      //dd($ext);


      //showing the extension only without the file name
        $extension= $request->file('profile_picture')->getClientOriginalExtension();
        // dd($extension);
      //dd($request->all()); 

      //code for storing the uploaded picture with time and extension
      $tostore = $ext . "_" . time() . "." . $extension;

      //for the saving the uploaded image in the database 
    $request->file('profile_picture')->storeAs('public/upload', $tostore);
     $id = Auth::user()->id;
     $user = User::whereId($id)->first();
     $user->profile_picture=$tostore;
     if($user->save()){
         return redirect()->back()->with('status', 'successfully uploaded');
     }else{
         return redirect()->back()->with('status', 'Operation failed');
     }
  }

  
}
