<?php

namespace App\Http\Controllers;



use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
//
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::Latest();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {



//        $file=$request->all();
//        $name=$file->getClientOriginalName('image');
//        $name->put($name,'images');
//        $post=new Post;
//        $post->path=$request->image;
//        $post->save();

//        dd($request->all());
        $input=$request->all();
        if($file=$request->file('image')){
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $input['path']=$name;

        }


        $input->title=$request->title;

        $post->create($input);




//         $file=$request->file('file');
//         return $file->getClientOriginalName();

//        $this->validate($request,[
//            'title'=>'required'
//        ]);

//       $post=new Post;
//       $post->title=$request->title;
//       $post->save();
//       return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::findOrFail($id);
       return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post=Post::findOrFail($id);
        $post->title=$request->title;
        $post->update();
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::whereId($id)->delete();
        return redirect('/posts');
    }
}
