@extends('layouts.app')
@section('content')
{{Session::forget('intended')}}
<section>
        <div class="header bg-full bg-cover bg-fixed d-flex justify-content-center align-items-center">
                <div class="text-center text-white">
                <h1>Welcome to MixN</h1>
                <h2>Here is a open place for laraveler to talk</h2>
                <a href="login" class="btn btn-outline-warning">Join us</a>
                 <a href="blogPost/Post" class="btn btn-outline-light">Go to Blog</a>            
                </div>        
        </div> 
        
</section>


@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
@endsection
