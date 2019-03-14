@extends('layouts.app') 
@section('content')

<div class="container d-flex justify-content-center align-items-center mt-4">
    <form action="{{route('userUpdate')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="formControl">
            <label for="">User Name</label>
            <input class="form-control" name="name" value="{{$user->name}}" type="text">
        </div>

        <div class="formControl">
            <label for="textarea">User byword</label>
            <textarea id="textarea" class="form-control" name="byword" rows="2" cols="10">{{$user->byword}}</textarea>

            <div class="formControl">
                <label for="textarea">User Description</label>
                <textarea id="textarea" name="user_desc" class="form-control" rows="6" cols="10">{{$user->user_desc}}</textarea>
            </div>

            <div class="formControl">
                <label id="file" for="image">Photo</label>
                <input id="image" name="image" class="form-control-file mb-2" type="file">
            </div>
        <img src="{{$user->user_img}}" class="my-4" alt="" style="display:block; width:150px; height:150px;">
            <input type="submit">
    </form>
    </div>
@endsection
 
@section('style')
    <link rel="stylesheet" href="css/userProfile">
@endsection