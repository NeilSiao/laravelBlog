
@extends('layouts.app')

@section('content')

<div class="my_container">
        
    <div id="left">
        <header>
            <img src="{{$post->user->user_img}}" alt=""> 
            <h2> {{$post->user->name}} </h2>
        </header>
            <section>
                <h3> {{$post->user->byword}}</h3>
                <p>{{$post->user->desc}}</p>
            </section>
    </div>
    

    <div id="right">
        <article id="article">
        <div class="userDetail">
            <div class="img_block">
                <img id="user_head" src="{{$post->user->user_img}}" alt="">
            </div>
            <div class="desc_block">
                <div class="author">
                    <span>{{$post->user->name}}
                        <a class="icon-home3" href="#"></a>
                    </span>
                </div>
                <div id="note">
                    <span>{{$post->user->posts()->count()}}貼文 </span><span>0comments</span>
                </div>
            </div>
        </div>

        <div id="content" class="content">
            {{$post->content}}

            <div id="content_footer">

            </div>
        </div>
        </article>
        <div id="comments">


        </div>
        {{-- comment start --}}
        {{-- <div class="comments"> 
        <img src="{{asset('images/dog.jpg')}}" alt="">
        <div>
            <span>NeilSiao</span>
            <span>好文推推，果然是大師之作</span>
        </div>    
            
        </div> --}}
        {{-- comment end --}}
        @Auth
        <div class="form-group mt-4">
        <form action="{{url("/comment/{$post->id}")}}"></form>
                <label for="comment">留言區</label>
                <textarea name="comment" id="user_comment" cols="12" rows="5" class="form-control mr-4"></textarea>
                <button onclick="sendComment({{$post->id}})" class="btn btn-primary btn-lg float-right mr-4 mt-2">送出</button>
        </div>
        @endAuth
        @guest
        <div class="comments">
        <a href="/login">登入後留言</a>
       
        </div>
        {{-- direct to current --}}
        {{Session::put('intended', "/blogPost/Post/{$post->id}" )}}

        @endguest
    <div>
            
</div>

<script>
function sendComment($post_id){
    let comment = document.getElementById('user_comment');

    let content = $('#comments');
    content.append('<div class="comments">\
        <img class="logo_img" src="https://res.cloudinary.com/dzjdn589g/image/upload/v1552376383/posts_img/dog.jpg" alt="">\
        <div><span>NeilSiao</span>\
        <span>' + user_comment.value +'</span>\
    </div>');

        
   /*  axios.post('/comment/' + $post_id)
    .then(function (response){
        
    })
    .catch(function (error){

    })
    .then(function (){

    }); */
    user_comment.value="";
}
 
</script>

@endsection

@section('style')
  <link rel="stylesheet" href="{{asset("css/show.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection