@extends('layouts.app') 
@section('content')
<div class="container d-flex justify-content-center mt-4">
  
  
  <div class="col-md-8 ">
      <div id="notice" style="display:none;" class="alert"></div>
      <div class="form-group">
        {{-- <form action="{{url('/blogPost/Post')}}" enctype="multipart/form-data" method="post">
          @csrf --}}
          <label for="" style="font-size:1.5rem;">
              @lang('view.title')
            </label>
            <a href="{{URL::previous()}}" style="float:right;" class="btn btn-warning">@lang('view.back')</a>
          <input class="form-control" name="title" id="title" value="{{$post->title}}">
        <label for="" style="font-size:1.5rem;">
                    @lang('view.content')
                </label>
              <textarea class="form-control rounded-0" name="content" id="content" cols="30" rows="15">{{$post->content}}</textarea>
        <input id="file" type="file" name="image"> 
        <div></div>
        <div class="mt-2" style="display:inline-block;" >@lang('view.progress'):</div> <span id="percent">0%</span> 
        <progress style="display:block;"  id="progress" max="100" value="0"></progress>       
        {{-- <div id="output">

        </div> --}}
        <button id="upload" onclick="sendForm({{$post->id}})" class="btn btn-primary float-right mr-4">@lang('view.submit')</button>
     {{--  </form> --}}
    </div>
  </div>
</div>
<div style="height:300px;">

</div>

<script type="text/javascript" src="{{asset('js/postupdate.js')}}"></script>
@endsection
 
@section('style')
<link rel="stylesheet" href="{{asset("css/create.css ")}}">
<link rel="stylesheet" href="{{asset("css/icomoon/style.css ")}}">
@endsection