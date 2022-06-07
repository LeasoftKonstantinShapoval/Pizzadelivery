@include('layouts.head')
@include('layouts.header')
    <!-- Контент -->
    <div class="container mb-5 profile">
        <div class="row">

            <!-- Профіль -->
            <div class="col-md-8">
                <div class="container container-big">
                    <div class="row row-60">
                        <div class="col-xl-4">
                            <div class="cabinet-menu">
                                <ul class="cabinet-list">
                                    <li class="cabinet-list-item active"><a href="{{ route('profile') }}">Особисті дані</a></li>
                                    <li class="cabinet-list-item "><a href="{{ route('showUserOrders', ['user_id' => $user->id]) }}">Історія замовлень</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <form method="post" action="{{ route('update', ['id' => $user->id]) }}" class="form" id="user-edit-form">
                                @csrf
                                <div class="form-group">
                                    <div class="nts-products__title">Особисті дані</div>
                                    <input type="text" class="input" name="first_name" placeholder="Ваше ім'я" value="{{ $user->name }}" required="">
                                    <input class="input inputmask" name="phone" type="text" inputmode="numeric" data-inputmask="'mask': '+38 (999) 999 99 99'" data-inputmask-placeholder="x" placeholder="Ваш номер телефону" value="{{ $user->phoneNumber }}" required="">
                                    <input type="email" name="email" class="input" placeholder="Ваш емейл" value="{{ $user->email }}" required="">
                                </div>
                                <div class="cabinet_address-buttons">
                                    <button class="btn btn-primary small" type="submit">Зберегти зміни</button>
                                </div>
                            </form>
                            @if(session('flesh'))
                                <div class="alert alert-success">
                                    {{ session('flesh') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('passwordChange', ['id' => $user->id]) }}" class="form" id="user-edit-password">
                                @csrf
                                <div class="nts-products__title">Зміна паролю </div>
                                <input type="password" name="old_password" placeholder="Ваш поточний пароль" class="input" required="">
                                <input type="password" name="password" placeholder="Ваш новий пароль" class="input invalid" required="">
                                <input type="password" name="password2" placeholder="Повторіть пароль" class="input invalid" required="">
                                <div class="cabinet_address-buttons">
                                    <button class="btn btn-secondary" type="reset">Скасувати</button>
                                    <button class="btn btn-primary small" type="submit">Зберегти зміни</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Бонуси -->
            <div class="col-md-4">
                <div class="nts-products__title">Бонуси</div>
                <section class="customer-percents">
                    <div class="bonus-price">
                        <span class="price">{{ $user->bonus }}<span class="currency">грн</span></span>
                        <div class="desc">
                            Оплачуйте бонусами будь-яку суму вашого замовлення
                        </div>
                    </div>
                </section>
                <section class="get-percents">
                    <div class="percents-list">
                        <div class="percent-item">
                            <div class="text">
                                Вы получаете бонусные <div class="percent-value">10%</div> процентів від суми заказу на бонусний рахунок.</div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- // Бонуси -->

        </div>
    </div>

    <!-- Подвал -->
@include('layouts.footer')
