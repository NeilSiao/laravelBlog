@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span style="display:inline-block; font-size:1.5rem;">@lang('view.dashboard')</span>
                    <a href="{{url('blogPost/Post/create')}}" class="btn btn-primary" style="float:right;">@lang('view.createPost')</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>@lang('view.posts')</h2>
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
                                <header style="font-size:1.5rem;"><a href="{{url("/blogPost/Post/{$post->id}")}}">
                                    {{$post->title}}</a>
                                </header>
                                
                                    <small>{{$post->updated_at}}</small>
                                </div>
                                <div class="btn_block">
                                <a href="{{url("/blogPost/Post/{$post->id}/edit")}}" class="btn btn-warning">@lang('view.edit')</a>
                                <form action="{{url("/blogPost/Post/{$post->id}")}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('@lang('view.confirm')');"value="@lang('view.delete')"></a>
                                </form>    
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
