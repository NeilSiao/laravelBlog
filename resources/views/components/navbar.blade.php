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
                <a href="aboutMe" class="nav-link">@lang('user.aboutMe')</a>
            </li>
            <li class="nav-item">
                <a href="blogPost" class="nav-link">@lang('user.blogPost')</a>
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
            {{ __('passwords.profile') }}
        </a>
        </div>
        </li>
    @endguest
      </ul>
    </div>
  </nav>