<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="header__logo">
                <a href="/"> <img width="40" src="{{ asset('img/logo/logo.svg') }}" alt="Pizza logo"/>
                    <h1>L`ora della</h1>
                </a>
            </div>
            <div class="menu-right justify-content-between d-flex">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('delivery') }}">Доставка та оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about_us') }}">Про нас</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-contact">
                    <a href="tel:+380661389821">
                        <span>+3 8(066)138-98-21</span>
                    </a>
                </div>
                @if(Auth::user())
                    @if(Auth::user()->role == 'admin')
                        <div class="menu-contact">
                            <a href="{{ route('admin_panel') }}">
                                <span>Адмін панель</span>
                            </a>
                        </div>
                    @endif
                    <div class="menu-contact">
                        <a href="/profile">
                            <span>Особистий кабінет</span>
                        </a>
                    </div>
                    <div class="menu-contact">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                            {{ __('Вихід') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="menu-user">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                                title="Увійти" data-bs-toggle="popover" data-bs-placement="bottom" data-content="Content">
                            <img src="{{ asset('img/person.svg') }}" href="" alt="#">
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <input id="email" type="email"
                                                           class="@error('email') is-invalid @enderror" name="email"
                                                           placeholder="Email" value="{{ old('email') }}" required
                                                           autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <input id="password" type="password"
                                                           class="@error('password') is-invalid @enderror" name="password"
                                                           placeholder="Password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <input type="submit" value="Увійти" href="{{ __('Login') }}">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="bottom-container">
                                            <div class="row">
                                                <div class="col-md">
                                                    <a href="/register" style="color:black" class="btn"><span>Ще не з нами?</span>Зарєеструватися</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                        </button>
                    </div>
                @endif
            </div>
        </div>

    </nav>
</header>

<body>
