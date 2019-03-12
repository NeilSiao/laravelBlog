<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with('user')->take(5)->get();
       // $post = DB::table('posts')->paginate(5);
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(3);

        if(Session::has('latest')){
            $latest = Session::get('latest');
        }else{    
            $latest = POST::orderBy('created_at', 'desc')->take(3)->get();
        }
        
        return view('post.index',['posts' => $posts, 'latest' => $latest]);
 
        /* return view('post.index'); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()){
            return view('post.create');
        }else{
            return Redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PostStoreRequest $request)
    {

        $user = Auth::user();
        $post = new Post();
        $validated = $request->validated();
        $title = $validated['title'];
        $content = $validated['content'];

        if($request->hasFile('image') && $validated['image']->isValid()){
            $image = $validated['image'];

            $path = $image->getRealPath();
            \Cloudinary::config(array(
            "cloud_name" => "dzjdn589g",
            "api_key" => "913728663371981",
            "api_secret" => "YdkY6SmwMXswvXpgjfjG9dCik6A"
            ));
        
         $data = \Cloudinary\Uploader::upload($path, array(
             "folder" => "posts_img/",
             "width" => "300",
             "height" => "200",
            )); 

            $post->post_img = $data['secure_url'];
        }
    
        $post->title = $title;
        $post->content = $content;
        $post->user_id = $user->id;
        $post->save();
       
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        //return a edit view
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
