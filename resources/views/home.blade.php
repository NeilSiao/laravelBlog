@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span style="display:inline-block; font-size:1.5rem;">Dashboard</span>
                    <a href="{{url('blogPost/Post/create')}}" class="btn btn-primary" style="float:right;">Create Post</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Your posts</h2>
                        <ul>

                            {{-- post start --}}
                            @if($user->Exists() && (count($posts) > 0))
                            @foreach ($posts as $post)
                                
                            <li>
                                <div class="user_desc">
                                    <img src=" {{$user->user_img}} " alt="">
                                    <span>{{$user->name}}</span>
                                </div>
                                <div class="content">
                                <header><a href="">{{$post->title}}</a> </header>
                                <a href="{{url("/blogPost/Post/$post->id")}}">
                                        <p>
                                            {{$post->content}}
                                        </p>
                                    </a>
                                    <small>{{$post->updated_at}}</small>
                                </div>
                            </li>
                            @endforeach
                            @endif
                            {{-- post end --}}

                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/home.css")}}">
<link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection
