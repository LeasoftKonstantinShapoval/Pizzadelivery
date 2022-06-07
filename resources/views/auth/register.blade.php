<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>L`ora della</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/icone.png') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<!-- Шапка -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="header__logo">
                <a href=""> <img width="40" src="./img/logo/logo.svg" alt="Pizza logo" />
                    <h1>L`ora della</h1>
                </a>
            </div>
            <div class="menu-right justify-content-between d-flex">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Доставка та оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Про нас</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-contact">
                    <a href="tel:+380661389821">
                        <span>+3 8(066)138-98-21</span>
                    </a>
                </div>
                <div class="menu-user">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" title="Увійти" data-bs-toggle="popover" data-bs-placement="bottom" data-content="Content">
                        <img src="img/person.svg" href="">
                    </button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="/action_page.php">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="username" placeholder="Username" required>
                                                <input type="password" name="password" placeholder="Password" required>
                                                <input type="submit" value="Увійти">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="bottom-container">
                                        <div class="row">
                                            <div class="col-md">
                                                <a href="#" style="color:black" class="btn"><span>Ще не з нами?</span>Зарєеструватися</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                </div>
            </div>
        </div>

    </nav>
</header>
<!-- Контент -->
<div class="container mb-5 registr">
    <div class="row">
        <form method="POST" action="{{ route('register') }}" style="max-width:500px;margin:auto">
            @csrf

            <h2>Регістрація</h2>
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input id="name" type="text" class="input-field @error('name') is-invalid @enderror" name="name" placeholder="Им'я" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input id="password-confirm" type="password" class="input-field" name="password_confirmation" placeholder="Півторить пароль" required autocomplete="new-password">

            </div>

            <button type="submit" class="btn-reg">Регістрація</button>
        </form>
        <div class="row">
            <div class="col-md">
                <a href="/login" class="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2"><span>Вже є акаунт?</span></a>
                <div class="modal" id="myModal2">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="/action_page.php">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="username" placeholder="Username" required>
                                            <input type="password" name="password" placeholder="Password" required>
                                            <input type="submit" value="Увійти">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                </button>
            </div>
        </div>
        <div class="bottom-container">

        </div>
    </div>
</div>
<!-- Подвал -->
<footer>
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-left">
                <div class="phones">
                    <div class="phone-item">
                        <span>Для прийому замовлень:</span>
                        <a href="tel:+380661234567">+380661234567</a>
                        <a href="tel:+380939876545">+380939876545</a>
                        <a href="tel:+380974567892">+380974567892</a>
                    </div>
                </div>
                <div class="work-time">
                    Графік роботи з буднів з 9:00 до 22:00
                </div>
                <div class="work-email">
                    <a href="mailto:email.com">email.com</a>
                </div>
            </div>
            <div class="footer-center">
                <div class="social">
                    <a href="">Ми у інстаграмм ></a>
                    <a href="">Ми у фейсбуці ></a>
                </div>
            </div>
            <div class="footer-right">
                <div class="person">
                    <a href=""><img src="img/person.png" alt=""><span>Увійти / Регістрація</span></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>©2022. L`ora della</span>
        </div>
    </div>
</footer>


<!-- Подключаем скрипты -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
