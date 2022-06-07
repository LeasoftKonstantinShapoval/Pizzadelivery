@include('layouts.head')
@include('layouts.header')
<!-- Контент -->
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="cart_order">
                    <div class="col">
                        <h3>Оформлення замовлення
                        </h3>
                        <span>Заповніть данні та вкажіть адресу доставки</span>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Им'я:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Ваше им'я" name="name" value="{{ Auth::user() && !empty(Auth::user()->name) ? Auth::user()->name : '' }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Потрібно заповнити</div>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label">Номер телефону:</label>
                            <input type="phone" class="form-control" id="pwd" placeholder="+380" name="phn" value="{{ Auth::user() && !empty(Auth::user()->phoneNumber) ? Auth::user()->phoneNumber : '' }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Потрібно заповнити</div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="uname" class="form-label">Адреса:</label>
                            <input type="text" class="form-control" id="address" placeholder="Адреса" name="adr" value="{{ Auth::user() && !empty(Auth::user()->addressDelivery) ? Auth::user()->addressDelivery : '' }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Потрібно заповнити</div>
                        </div>
                        <select class="form-select" id="paymentType">
                            <option>Карткою</option>
                            <option>Готівкою</option>
                        </select>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="validate()" value="0" id="bonusCheckbox">
                            <label class="form-check-label" for="flexCheckChecked">
                                Сплатити бонусами {{ Auth::user() && !empty(Auth::user()->bonus) ? Auth::user()->bonus : 0 }}₴
                            </label>
                            <input type="hidden" id="userBonus" name="userBonus" value="{{ Auth::user() && !empty(Auth::user()->bonus) ? Auth::user()->bonus : 0 }}">
                        </div>
                        <button onclick="submitOrder()" class="btn btn-primary mb-3 mt-3">Підтвердити</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Корзина -->
        @include('layouts.cart')
        <!-- // Корзина -->
    </div>
</div>

<!-- Подвал -->
@include('layouts.footer')
