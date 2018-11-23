<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function(){
    return "hello world";
});
Route::get('/contact',function(){
    return "08061369159";
});
//the above codes

Route::get('/name/{name}','StandardController@name');
    

/*the curly bracket is used to get an info from the user and 
pass it to the  call-back function holding($name) and call 
it back using return function*/

Route::get('/name/{name}/{name_1}',function($name,$name_1){
    return "this name ".$name ." is an enemy to ".$name_1;
});

/* this routing is used to 
 */

Route::get('/a',function(){
    $names=['seun ','charles ','Praise ','tonye ','esther ','etc '];
    foreach($names as $name){
       echo $name."<br>";
    }
});

/* this routing is used to create/declare an array containing the names of people, 
and then use a 'foreach loop' to loop those $names['seun',...]. 
then use echo to display the variable that have been defined as $name */


Route::get('/a',function(){
    $names=['seun ','charles ','Praise ','tonye ','esther ','etc '];
        dd($names);
    foreach($names as $key=>$value){
       echo $key." ". $value ."<br>";
    }
});

/* The above is used for declaring an array-$names,loop the array using 'foreach' while */

//connecting to our blade
Route::get('/homepage',function(){
    return view('homepage');
});

Route::get('/homepage/test','StandardController@homepage');
   

/* compact is used to send/link the value of the array/variable $names fom your web page to the view page 
 or 'mine.blade.php' page 
instead of rewriting the codes*/

Route::get('/first',function(){
    $names=['seun ','charles ','Praise ','tonye ','truth','esther ','Kenneth'];
       return view('home', compact('names'));  
    });


Route::get('/second',function(){
    $names=['seun ','charles ','Praise ','tonye ','truth','esther ','Granville'];
       return view('categories', compact('names'));    
});

Route::get('/third',function(){
    $names=['seun ','charles ','Praise ','tonye ','truth','Gospel','Orange '];
       return view('explore', compact('names'));
});


Route::get('/fourth',function(){
    $names=['seun ','charles ','Praise ','tonye ','truth','Esther ','justice'];
       return view('software', compact('names'));  
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('pages/index','StandardController@index');

Route::get('post/create','StandardController@create')->middleware('auth');
Route::post('post/create','StandardController@store')->middleware('auth');


Route::get('pages/services', 'StandardController@services');
Route::get('post/view_blog', 'StandardController@view');

Route::get('post/title', 'StandardController@title')->name('title');
Route::get('post/details/{id}','StandardController@detail')->name('details');

//code for update and editing of post
Route::get('post/edit/{id}', 'StandardController@edit')->name('edit');
Route::post('post/edit/{id}','StandardController@update')->name('update');

//code for deleting post
Route::get('post/view_blog/{id}','StandardController@delete')->name('delete');

//code for comments
Route::post('post/comment', 'CommentController@store')->name('post.comment');

//route for uploading images
Route::post('user/profile/post','StandardController@uploadprofile')->name('upload.profile')->middleware('auth');
Route::get('user/profile/post', function(){
    return view('post.profile');
 })-> middleware('auth');

 //
