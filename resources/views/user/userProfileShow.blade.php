@extends('layouts.app')

@section('content')

<div id="outer">
    <div class="profile_block">
        <header>
            <img class="img_size" src="{{$user->user_img}}" alt=""> 
            <h2 class="text-align-center bottom_border"> {{$user->name}} </h2>
        </header>
        <section>
            
            <h3>
                @if(strlen($user->byword) == 0)
                <h3 class="text-align-center mt-3">User Byword</h3> 
                <span class="byword">Watch your thoughts; for they become words.
                <br> Watch your words; for they become actions.</span>
                @else
                <span class="byword">{{$user->byword}}</span>
                @endif
            </h3>
            
            <h3 class="text-align-center mt-1">User Desciption</h3>
            @if(strlen($user->desc) ==0)
            <span class="desc">Apparently, this user prefers to keep an air of mystery about them</span>
            @else
            <span class="desc" >{{$user->user_desc}}</span>
            @endif
        </section>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/userProfileShow.css")}}">
@endsection