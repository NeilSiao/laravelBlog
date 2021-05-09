@extends('layouts.app') 
@section('content')

<div class="container d-flex justify-content-center align-items-center mt-4" style="flex-flow:column;">
        @include('components.alert')
        <label for="">@lang('view.userPhoto')</label>
        <img src="{{$user->user_img}}" alt="" style="width:150px; height:150px; border-radius:10%;">
        
        <form action="{{route('userUpdate')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="formControl">
            <label for="">@lang('view.userName')</label>
            <input class="form-control" name="name" value="{{$user->name}}" type="text">
        </div>

        <div class="formControl">
            <label for="textarea">@lang('view.userByword')</label>
            <textarea id="textarea" class="form-control" name="byword" rows="2" cols="10">{{$user->byword}}</textarea>

            <div class="formControl">
                <label for="textarea">@lang('view.userDesc')</label>
                <textarea id="textarea" name="user_desc" class="form-control" rows="6" cols="10">{{$user->user_desc}}</textarea>
            </div>

            <div class="formControl">
                <label id="file" for="image">@lang('view.userPhoto')</label>
                <input id="image" name="image" class="form-control-file mb-2" type="file">
            </div>
            <input type="submit" style="float:right; position:relative; top:-38px;" value="@lang('view.submit')">
    </form>
    </div>
@endsection
 
@section('style')
    <link rel="stylesheet" href="css/userProfile">
@endsection