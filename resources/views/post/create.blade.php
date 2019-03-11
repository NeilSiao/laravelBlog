@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="col-md-8 ">
        <div class="form-group">
        <form action="{{url('/blogPost/Post')}}" enctype="multipart/form-data" method="post">
            @csrf
            <label for="" style="font-size:1.5rem;">
                Title
            </label>
            <input class="form-control" name="title" id="title" >
                <label for="" style="font-size:1.5rem;">
                    Content
                </label>
                <textarea class="form-control rounded-0" name="content" id="content" cols="30" rows="15" >
    
                </textarea>
        

        <input type="file" name="image" method="post">


        <progress id="progress" max="100" value="35"></progress>

        <input type="submit" class="btn btn-primary float-right mr-4" value="發佈">
        </form>
        </div>
    </div>
</div>


{{-- <script>
$.ajax({
  xhr: function() {
    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener("progress", function(evt) {
      if (evt.lengthComputable) {
        var percentComplete = evt.loaded / evt.total;
        percentComplete = parseInt(percentComplete * 100);
        console.log(percentComplete);

        if (percentComplete === 100) {

        }

      }
    }, false);

    return xhr;
  },
  url: posturlfile,
  type: "POST",
  data: JSON.stringify(fileuploaddata),
  contentType: "application/json",
  dataType: "json",
  success: function(result) {
    console.log(result);
  }
});
cope
adversity

</script> --}}

@endsection
@section('style')
  <link rel="stylesheet" href="{{asset("css/create.css")}}">
  <link rel="stylesheet" href="{{asset("css/icomoon/style.css")}}">
@endsection