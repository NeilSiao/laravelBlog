<nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top ">
    <a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="discuss" class="nav-link">@lang('user.discuss')</a>
            </li>
            <li class="nav-item">
                <a href="blogPost" class="nav-link">@lang('user.blogPost')</a>
            </li>
            <li class="nav-item">
                    <a href="aboutMe" class="nav-link">@lang('user.aboutSite')</a>
            </li>
        </ul>


      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('user.login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item mr-4">
                <a class="nav-link" href="{{ route('register') }}">{{ __('user.register') }}</a>
            </li>
        @endif

        @else
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{-- user profile --}}
        <a class="dropdown-item" href="{{ route('userProfile') }}">
        {{ __('passwords.profile') }}
        </a>
            
        <a class="dropdown-item" href="{{ route('home') }}">
        {{ __('passwords.dashboard') }}

        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('passwords.Logout') }}
    </a>
    </a>
        </div>
        </li>
    @endguest
    <li class="dropdown">
            <a href="#" class="dropdown-toggle btn btn-primary mr-4" data-toggle="dropdown">
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <ul class="dropdown-menu">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                    @endif
                @endforeach
            </ul>
    </li>
      </ul>
    </div>
  </nav>