@extends('layouts.app')

@section('content')
    <div class="my_container">
    <div id="left">
        <div class="outer">
            <header>
                <img src="{{asset('images/dog.jpg')}}" alt=""> 
            </header>
            <div>
                <h3> im a Coder.</h3>
                <p>美夢成真</p>
            </div>
        </div>
    </div>

    <div id="right">
        <div id="userDetail">
            <img src="{{asset('images/dog.jpg')}}" alt="">
            <div>
                <div id="author"><span>NeilSiao<a class="icon-home3" href="#"></a></span>
                </div>
                <div id="note"><span>3貼文</span><span>comments</span></div>
            </div>
        </div>
        <div id="content">

            <div id="content_footer">

            </div>
        </div>

        <div id="comments">

        </div>
    <div>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset("css/show.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
    @endsection