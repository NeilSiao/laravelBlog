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

                            <li>
                                <div class="user_desc">
                                    <img src=" {{asset('images/dog.jpg')}} " alt="">
                                    <span>NeilSiao</span>
                                </div>
                                <div class="content">
                                    <header><a href="">title</a> </header>
                                    <a href="">
                                        <p>
                                            contentNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSia
                                        </p>
                                    </a>
                                    <small>2019/03/05</small>
                                </div>
                            </li>
                            <li>
                                    <div class="user_desc">
                                        <img src=" {{asset('images/dog.jpg')}} " alt="">
                                        <span>NeilSiao</span>
                                    </div>
                                    <div class="content">
                                        <header><a href="">title</a> </header>
                                        <a href="">
                                            <p>
                                                contentNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSiaNeilSia
                                            </p>
                                        </a>
                                        <small>2019/03/05</small>
                                    </div>
                                </li>
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
