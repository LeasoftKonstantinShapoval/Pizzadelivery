<body>
<!-- Шапка -->
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
                            <a class="nav-link" href="{{ route('admin_orders') }}">Закази</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_panel') }}">Товари</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin_users') }}">Користувачі</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
