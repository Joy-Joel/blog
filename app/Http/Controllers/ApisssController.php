<?php

namespace App\Http\Controllers;

use App\Apisss;
use Illuminate\Http\Request;
use Illuminate\Http\Request\PostRequest;
use App\User;
use App\Http\Resources\UserapiResource as Usersource;
class ApisssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
    //  $check=User::whereEmail($request->email)->wherePassword(\Hash::make($request->password));
    // //  dd($check->get());
    //  if($check){
        if((\Auth::attempt(['email'=>request('email'), 'password'=>request('password')]))){

        return response()->json([
            'status'=>201,
            'message'=>'Login Was Successful'
        ]);
            } 
                else{
            return response()->json([
                'status'=>404,
                'message'=>'Unauthorized User'
            ]);
     }
    }

    public function index()
    {
        
        $user= User::all();
        return Usersource::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->phone_no);
        // /dd(User::whereEmail($request->email)==null);
        if(count(User::whereEmail($request->email)->get())>=1){
            return response()->json([
                'status'=>501,
                'message'=>'Email address already exist, enter another address
                 or get out of here!!!!'
            ]);
        }
        else if(count(User::wherePhone_no($request->phone_no)->get()) >=1){
            return response()->json([
                'status'=>503,
                'message'=>'Phone number already exist, please input another number'
            ]);
        }else{
        $user=new User([
            'name' =>$request->name,
            'email' =>$request->email,
            'password'=>\Hash::make($request->password),
            'gender'=>$request->gender,
            'phone_no'=>$request->phone_no,
        ]);
            if ($user->save() );
            return response()->json([
                'status'=>200,
                'message'=>'Nice one buddy, It is saved to the database!!!'
            ]);
        }

        // $this->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);
        
            }
           

    /**
     * Display the specified resource.
     *
     * @param  \App\Apisss  $apisss
     * @return \Illuminate\Http\Response
     */
    public function show($apisss)
    {
        $user=User::whereId($apisss)->first();
        // echo $apisss;
        if(!$user){
            return response()->json([
             'status'=>'404',
             'message' => 'This user is not found in the database'
            ]);
        }
        return response()->json([
            'status'=>'200',
             'message' => 'Successful',
             'result' => [
                 'Id'=>$user->id,
                 'name'=>$user->name,
                 'email'=>$user->email
             ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apisss  $apisss
     * @return \Illuminate\Http\Response
     */
    public function edit(Apisss $apisss)
    {
     $user=User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apisss  $apisss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apisss $apisss)
    {
            
        $post=Post::whereId($id)->first();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return response()->json();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apisss  $apisss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apisss $apisss)
    {
        //
    }
}

