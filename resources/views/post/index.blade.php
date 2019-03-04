@extends('layouts.app')

@section('content')

    <div id="container">
  
        <div id='aside'>
            <div style="font-size:1.5rem;text-align:center;height:45px;">
                最新消息
            </div>
            <div>
               <ul>
                   <li>
                       <div id="img_logo">
                           <img src="{{asset('images/dog.jpg')}}" alt="">   
                       </div>
                       <div id="news">
                           @for ($i=0; $i<5; $i++)
                           {{$user = $users->shift()}}
                           <a href="">{{$user->title}}</a>
                            <span>{{$user->name}}</span> 
                           <small>{{$user->post()->updated_at}}</small>
                           @endfor
                    </div>
                </li>
               </ul>
            </div>
            <h3>

            </h3>
        </div>
        <div id="menu">

                    <div id="post_logo">
                        <img  src="{{asset('images/laravel-text-logo.png')}}" alt="">
                    </div>
                <div id="post_text">
                    <h5>
                    <img src="{{asset('images/dog.jpg')}}" alt="">
                        <span>
                            Neil
                            <a href="" class="icon-home3"></a>
                        </span> 
                    </h5>
                    <a id="short_tag" href="/blogPost/Post/1">
                        hello i'm neiladadasdsadadsfads
                    </a>
                    <small>2019-03-03</small>
                </div>
                
        </div>
         
  
    @endsection

    @section('style')
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
    @endsection