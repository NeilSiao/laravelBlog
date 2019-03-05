@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="col-md-8 ">
        <div class="form-group">
            <label for="" style="font-size:1.5rem;">
                Title
            </label>
            <input class="form-control" name="title" id="title" >
        </div>
        <div class="form-group">
                <label for="" style="font-size:1.5rem;">
                    Content
                </label>
                <textarea class="form-control rounded-0" name="content" id="content" cols="30" rows="15" >
    
                </textarea>
            </div>
    </div>
</div>
@endsection
@section('style')
  <link rel="stylesheet" href="{{asset("css/create.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection