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
        <article>
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

        <div class="content">
            {{$post->content}}

            <div id="content_footer">

            </div>
        </div>
        </article>
        <div id="comments"> 
        <img src="{{asset('images/dog.jpg')}}" alt="">
        <div>
            <span>NeilSiao</span>
            <span>好文推推，果然是大師之作</span>
        </div>    
            
        </div>

    <div>
            
</div>


@endsection

@section('style')
  <link rel="stylesheet" href="{{asset("css/show.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection