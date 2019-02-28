<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="blogPost" class="nav-link">Laravel討論區</a>
            </li>
            <li class="nav-item">
                <a href="blogPost" class="nav-link">關於我</a>
            </li>
            <li class="nav-item">
                <a href="blogPost" class="nav-link">技術文章</a>
            </li>
        </ul>


      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item mr-4">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('passwords.Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a class="dropdown-item" href="{{ route('userProfile') }}"
            onclick="event.preventDefault();">
            {{ __('profile') }}
        </a>
        </div>
        </li>
    @endguest
      </ul>
    </div>
  </nav>