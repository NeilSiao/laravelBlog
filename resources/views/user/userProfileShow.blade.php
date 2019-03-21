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
                <h3 class="text-align-center mt-3">@lang('view.byword')</h3> 
                @if(strlen($user->byword) == 0)
                <span class="byword">@lang('view.defaultByword_1')Watch your thoughts; for they become words.
                <br> @lang('view.defaultByword_2')Watch your words; for they become actions.</span>
                @else
                <span class="byword">{{$user->byword}}</span>
                @endif
            </h3>
            
            <h3 class="text-align-center mt-1">@lang('view.userDesc')</h3>
            @if(strlen($user->desc) ==0)
            <span class="desc">@lang('view.desc')Apparently, this user prefers to keep an air of mystery about them</span>
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