<li class="dropdown" id="nav-lang">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {{ Config::get('languages')[App::getLocale()] }}
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <li>
                    <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</li>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!--    Brand    and    toggle    get    grouped    for    better    mobile    display    -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{__('Learning Laravel')}}</a>
        </div>
        <!--    Navbar    Right    -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">{{__('Home')}}</a></li>
                <li><a href="/about">{{__('About')}}</a></li>
                <li><a href="/contact">{{__('Contact')}}</a></li>
                <li><a href="/blog">{{__('Blog')}}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{__('Member')}}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::check())
                            @role('manager')
                            <li><a href="/admin">Admin</a></li>
                            @endrole
                            <li><a href="/users/logout">{{__('Logout')}}</a></li>
                        @else
                        <li><a href="/users/register">{{__('Register')}}</a></li>
                        <li><a href="/users/login">{{__('Login')}}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>