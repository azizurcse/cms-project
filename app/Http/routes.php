<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\User;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});
////Route::resource('posts','PostsController');
////Route::get('/hello','PostsController@sayhello');
////Route::get('/insert',function(){
////    DB::insert('insert into posts(title,body)values(?,?)',['php with laravel 5.2','laravel is awesome framework 5.2']);
////});
////
////Route::get('/view',function(){
////    $value=DB::select('select * from posts where id=?',[1]);
////
////    return $value;
////});
////
////Route::get('/update',function (){
////    DB::update('update posts set title="update title" where id=?',[1]);
////});
////Route::get('/delete',function (){
////  $data= DB::delete('delete from posts where id=?',[1]);
////   return $data;
////});
//
//
////Route::get('/read',function (){
////  $post= Post::all();
////
////  foreach ($post as $title){
////      return $title->title;
////  }
////
////});
//
//Route::get('/find',function (){
//   $post=Post::find(3);
//   return $post->title;
//});
//
//Route::get('/findwhere',function (){
//   $posts=Post::where('id',3)->orderBy('id','asc')->take(1)->get();
//   return $posts;
//});
//
//
//Route::get('/basicinsert',function (){
//   $posts= new Post;
//   $posts->title="this is eloquent title";
//   $posts->body="this is eloquent body";
//   $posts->save();
//});
//
//
//Route::get('/basicinsert2',function (){
//    $posts=Post::find(2);
//    $posts->title="this is eloquent title 2";
//    $posts->body="this is eloquent body 2";
//    $posts->save();
//});
//
//Route::get('/update',function(){
//   Post::where('id',2)->where('is_admin',0)->update(['title'=>'this is update','body'=>'our lecture edwin nice']);
//});
//
//Route::get('/delete',function(){
//   $post=Post::find(2);
//   $post->delete();
//});
//
//Route::get('/softdelete',function(){
//   Post::find(6)->delete();
//});
//
//Route::get('/readsoft',function(){
//   $post=Post::onlyTrashed()->where('is_admin',0)->get();
//   return $post;
//});
//
//Route::get('/restore',function(){
//   Post::withTrashed()->where('is_admin',0)->restore();
//});
//
//Route::get('/forcedelete',function(){
//   Post::onlyTrashed()->where('is_admin',0)->forceDelete();
//});
//
//
//Route::get('/user/{id}/post',function ($id){
//    return User::find($id)->post;
//});
//
//Route::get('/post/{id}/user',function ($id){
//    return Post::find($id)->user;
//});
//
//Route::get('/posts',function(){
//   $user=User::find(1);
//   foreach($user->posts as $post)
//   {
//      echo $post->title;
//   }
//});
//
//Route::get('user/{id}/role',function($id){
//   $user=User::find($id)->roles()->orderBy('id','desc')->get();
//
//   return $user;
////   Foreach($user->roles as $role)
////   {
////       return $role->name;
////   }
//});
//
//Route::get('/user/country',function(){
//   $country= Country::find(6);
//   foreach ($country->posts as $post)
//   {
//       return $post->title;
//   }
//});
//
//Route::get('user/photos',function(){
//    $user=User::find(1);
//    foreach ($user->photos as $photo) {
//        return $photo->path;
//    }
//});
//
//Route::get('post/{id}/photos',function($id){
//    $posts=Post::find($id);
//    foreach ($posts->photos as $photo) {
//        echo $photo->path."<br>";
//    }
//});
//
//Route::get('photo/{id}/post',function($id){
//   $photo= Photo::findOrFail($id);
//   return $photo->imageable;
//});
//
//Route::get('/post/tag',function(){
//    $post=Post::find(1);
//    foreach ($post->tags as $tag){
//        echo $tag->name;
//    }
//
//});
//
//Route::get('tag/post',function(){
//    $tag= Tag::find(2);
//    foreach ($tag->posts as $post){
//        echo $post->title;
//    }
//});

Route::resource('/posts','PostController');

Route::get('/dates',function (){
   $date=new DateTime('+1 week');

   echo $date->format('m-d-Y');
   echo "<br>";
   echo Carbon::now()->addDays(10)->diffForHumans();
});

Route::get('/getname',function (){
   $user= User::find(1);

   return $user->name;
});

Route::get('/setname',function (){
    $user= User::find(1);
    $user->name="azizur";
    $user->save();
});