@extends('layouts.app')

@section('content')

<div id="left">
    <div class="profile_block">
        <header>
            <img src="{{$user->user_img}}" alt=""> 
            <h2> {{$user->name}} </h2>
        </header>
        <section>
            <h3> {{$user->byword}}</h3>
            <p>{{$user->user_desc}}</p>
        </section>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/userProfileShow.css")}}">
@endsection