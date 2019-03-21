@extends('layouts.app')
@section('content')
{{Session::forget('intended')}}
<section>
        <div class="header bg-full bg-cover bg-fixed d-flex justify-content-center align-items-center">
                <div class="text-center text-white type_block" >
                <h3 id="typeit" ></h3>

                <a href="register" class="btn btn-outline-warning">@lang('view.join')</a>
                <a href="blogPost/Post" class="btn btn-outline-light">@lang('view.blog')</a> 
        </div> 
      
          
        </div>
      
 
        
</section>

<script src="https://cdn.jsdelivr.net/npm/typeit@6/dist/typeit.min.js"></script>
<script>
axios.get('/welcomeStr')
.then(function (res){
        new TypeIt('#typeit')
        .type(res.data[0])
        .pause(1500)
        .break()
        .options({'speed': 90, 'cursor':true})
        .type(res.data[1])
        .go()
})
.catch(function (err){

})
.then(function (){

});
</script>
        

@endsection

@section('style')
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
@endsection
