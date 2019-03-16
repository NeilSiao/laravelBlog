@extends('layouts.app')
@section('content')
{{Session::forget('intended')}}
<section>
        <div class="header bg-full bg-cover bg-fixed d-flex justify-content-center align-items-center">
                <div class="text-center text-white mb-4">
                <h1>@lang('view.welcome')</h1>
                <h2>@lang('view.welcomeDesc')</h2>
                <a href="login" class="btn btn-outline-warning">@lang('view.join')</a>
                 <a href="blogPost/Post" class="btn btn-outline-light">@lang('view.blog')</a>            
                </div>        
        </div> 
</section>


@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
@endsection
