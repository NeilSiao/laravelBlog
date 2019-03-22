<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Cloudinary;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth',['except' => ['index', 'show']]);

           
    }

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
       // $post->setPath(''); //use relative route;
        if(Session::has('latest')){
            $latest = Session::get('latest');
        }else{    
            $latest = POST::orderBy('created_at', 'desc')->with('user')->take(3)->get();
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
       
        return url("blogPost/Post/{$post->id}");
        /* return redirect('/dashboard'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        $comments = Comment::with('user')->where('post_id' ,'=', $id)->get();
        return view('post.show', ['post' => $post, 'comments' =>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        $user = Auth::user();
        if($post->exists()){
            if($user->id == $post->user_id) {
                return view('post.edit')->with('post', $post);
            }else{
                return 'You are not the post\'s owner!!';
            }
        }else{
            return 'post can\'t be found' ;
        }
        return 'unknown problem has occur';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $post_id)
    {
       
        $user = Auth::user();
        $post = Post::findorFail($post_id);
  
        if($post->exists()){
            if($user->id == $post->user_id) {
                $validated = $request->validated();
                $title = $validated['title'];
                $content = $validated['content'];
        
                if($request->hasFile('image') && $validated['image']->isValid()){
                    $image = $validated['image'];
                    $path = $image->getRealPath();
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
                return 'Post更新成功';
            }else{
                return 'You are not the post\'s owner!!';
            }
        }else{
            return 'post can\'t be found' ;
        }
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        $user = Auth::user();
        if($user->id == $Post->user_id){
            $Post->delete();
        }
        return redirect()->back();
    }
}
