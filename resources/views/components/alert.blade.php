@if(session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@elseif(session('error'))
    @if(is_array(session('error')))
        @for ($i = 0; $i < count(session('error')); $i++)
            <div class="alert alert-danger">{{ session('error')[$i] }}</div>
        @endfor
    @else 
        <div class="alert alert-danger">{{ session('error')[$i] }}</div>
    @endif
@endif  