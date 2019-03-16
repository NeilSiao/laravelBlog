@extends('layouts.app')

@section('content')

    <div id="container">
  
        <div id='aside'>
            <div style="font-size:1.5rem;text-align:center;height:45px;">
                @lang('view.news')
            </div>
            <div>
               <ul>
                    @if(!$latest->isEmpty())
                    @foreach ($latest as $post)
                   <li>
                            <div id="img_logo">
                                <img src="{{$post->user->user_img}}" alt="">   
                            </div>
                            <div id="news">
                            <a href="">{{$post->title}}</a>
                            <span>{{$post->user->name}}</span> 
                            <small>{{$post->updated_at}}</small>
                    @endforeach
                           @else
                           <span>Dont have any posts</span>
                           @endif
                            </div>
                </li>
               </ul>
               <div>
                    
               </div>
            </div>
               
                
        </div>
       
       <div class="outer">
        @if(!$posts->isEmpty())
        @foreach ($posts as $post)
        <div id="menu">
                    <div id="post_logo">
                        <img  src="{{$post->post_img}}" alt="">
                    </div>
                <div id="post_text">

                   
                    <div class="user_img">
                        <img src="{{ $post->user->user_img }}" alt="">
                    </div>
                    <div class="right">

                    
                    <div class="user_desc_top">
                    <h5>
                        <span>
                            {{$post->user->name}}
                            <a href="/profile/{{$post->user->id}}" class="icon-home3"></a>
                            </span> 
                        </h5>
                    </div>
                <div class="post_content">
                    <a id="short_tag" href="/blogPost/Post/{{$post->id}}">
                        {{$post->content}}
                    </a>
                </div>        
                <div class="post_time">
                    <small> {{$post->created_at}} </small>
                </div>
            </div>
                </div>
        </div>
        @endforeach
     {{-- <!- menu container-!> --}}
     {{$posts->links()}}
    @else
        <span>dont have any posts</span>
    @endif
    </div>
    @endsection

    @section('style')
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
    @endsection