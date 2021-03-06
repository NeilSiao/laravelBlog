
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
                <p>{{$post->user->user_desc}}</p>
            </section>
    </div>
    

    <div id="right">
        <article id="article">
        <div class="userDetail">
            <div class="img_block">
                <img id="user_head" src="{{$post->user->user_img}}" alt="">
            </div>
            <div class="desc_block">
                    <a href="{{URL::previous()}}" style="float:right;" class="btn btn-warning">@lang('view.back')</a>
                <div class="author">
                    <span>{{$post->user->name}}
                        <a class="icon-home3" href="{{url("/profile/{$post->user->id}")}}"></a>
                    </span>
                </div>
                <div id="note">
                    <span>{{$post->user->posts()->count()}}貼文 </span><span ><span id="commentnum">{{count($post->comment)}}</span> comments</span>
                </div>
            </div>
        </div>

        <div id="content" class="content">
            {!!$post->content!!}

            <div id="content_footer">

            </div>
        </div>
        </article>
        <div id="comments">
            @if(count($comments) > 0)
            @foreach($comments as $comment)
            <div class="comments">
            <img class="logo_img" src="{{$comment->user->user_img}}" alt="">
            <div>
            <span>{{$comment->user->name}}</span>
            <span class="user_comment">{!!$comment->comment!!}</span>
            <small> {{$comment->created_at}} </small>
            </div>     
            </div>
            @endforeach
            @endif
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
                <label for="comment">@lang('view.commentArea')</label>
                <textarea name="comment" id="comment_area" cols="12" rows="5" class="form-control mr-4"></textarea>
                <button onclick="sendComment({{$post->id}})" class="btn btn-primary btn-lg float-right mr-4 mt-2">@lang('view.submit')</button>
        @endAuth
        @guest
        <div class="comments mt-4 ml-2">
        <a href="/login">@lang('view.loginToComment')</a>
       
        </div>
        {{-- direct to current --}}
        {{Session::put('intended', "/blogPost/Post/{$post->id}" )}}

        @endguest
    <div>
            
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
 var editor = CKEDITOR.replace('comment_area');
</script>
<script>
function sendComment($post_id){
    let data = editor.getData();

   /*  var user_comment = document.getElementById('user_comment'); */

    var content = $('#comments');
    
     axios.post('/comment/' + $post_id, {
         comment: data
     })
    .then(function (response){
        let user = response.data.user;
        let comment = response.data.comment;
        content.append('<div class="comments">\
        <img class="logo_img" src="'+ user.user_img +'" alt="">\
        <div><span>' + user.name + '</span>\
        <span class="user_comment">' + data +'</span>\
        <small>' + comment.created_at + '</small>\
        </div>');

        /* user_comment.value=""; */
        //after submit clean comment
        editor.setData('');

        let cmtNum = document.getElementById('commentnum');
        let tmp = Number(cmtNum.innerHTML.trim()) + 1;
        cmtNum.innerHTML = tmp;
        
    })
    .catch(function (error){

        console.log(error);
    })
}
</script>

@endsection

@section('style')
  <link rel="stylesheet" href="{{asset("css/show.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection